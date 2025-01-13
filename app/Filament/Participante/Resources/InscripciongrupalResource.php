<?php

namespace App\Filament\Participante\Resources;

use App\Filament\Participante\Resources\InscripciongrupalResource\Pages;
use App\Filament\Participante\Resources\InscripciongrupalResource\RelationManagers;
use App\Models\Inscripcion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class InscripciongrupalResource extends Resource
{
    protected static ?string $model = Inscripcion::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $label = 'Inscripción Grupal';

    protected static ?string $pluralLabel = 'Inscripciones Grupales';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('usuario_name')
                    ->label('Usuario')
                    ->default(auth()->user()->name . ' ' . auth()->user()->apellido)
                    ->disabled() // Campo no editable
                    ->required(),

                Forms\Components\Select::make('juego_id')
                    ->label('Nombre del Juego')
                    ->options(function () {
                        return \App\Models\Juego::all()->pluck('nombre', 'id');
                    })
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('equipo_id')
                    ->label('Equipo')
                    ->relationship('equipo', 'nombre')
                    ->searchable()
                    ->preload()
                    ->nullable()
                    ->afterStateUpdated(function (callable $set, $state) {
                        $set('tipo', $state ? 'Grupo' : 'Individual'); // Cambia automáticamente el tipo
                    })
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nombre')
                            ->label('Nombre del Equipo')
                            ->required()
                            ->placeholder('Ejemplo: Los Ganadores'),
                        Forms\Components\Select::make('lider_id')
                            ->label('Líder del Equipo')
                            ->options(function () {
                                return \App\Models\User::all()->mapWithKeys(function ($user) {
                                    return [$user->id => $user->name . ' ' . $user->apellido];
                                });
                            })
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Forms\Components\MultiSelect::make('integrantes') // Seleccionar múltiples usuarios
                            ->label('Integrantes')
                            ->options(function () {
                                return \App\Models\User::all()->mapWithKeys(function ($user) {
                                    return [$user->id => $user->name . ' ' . $user->apellido];
                                });
                            })
                            ->required(),
                    ]),

                Forms\Components\TextInput::make('tipo')
                    ->label('Tipo de inscripción')
                    ->default('Grupo')
                    ->disabled()
                    ->required(),

                Forms\Components\TextInput::make('estado_pago')
                    ->label('Estado del Pago')
                    ->default('pendiente')
                    ->disabled() // Campo no editable
                    ->required(),

                Forms\Components\FileUpload::make('juego.imagen')
                    ->label('Imagen del Juego')
                    ->disk('public')
                    ->directory('juegos')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(fn () => Inscripcion::where('tipo', 'Grupo') // Filtra solo inscripciones grupales
                ->where('usuario_id', auth()->id()) // Filtra solo inscripciones del usuario autenticado
            )
            ->columns([
                Tables\Columns\TextColumn::make('usuario')
                    ->label('Usuario')
                    ->formatStateUsing(fn ($record) => "{$record->usuario->name} {$record->usuario->apellido}")
                    ->sortable()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('juego.imagen')
                    ->label('Imagen del Juego')
                    ->size(60)
                    ->url(fn ($record) => $record->juego->imagen ? Storage::url($record->juego->imagen) : null)
                    ->openUrlInNewTab(),

                Tables\Columns\TextColumn::make('juego.nombre')
                    ->label('Nombre del Juego')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('equipo.nombre')
                    ->label('Equipo')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn($state) => $state ?? 'Sin equipo'),

                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo de inscripción')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('estado_pago')
                    ->label('Estado del Pago')
                    ->colors([
                        'success' => 'aprobado',
                        'danger' => 'rechazado',
                        'warning' => 'pendiente',
                    ])
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInscripciongrupals::route('/'),
            'create' => Pages\CreateInscripciongrupals::route('/create'),
            'edit' => Pages\EditInscripciongrupals::route('/{record}/edit'),
        ];
    }
}
