<?php

namespace App\Filament\Tesorero\Resources;

use App\Filament\Tesorero\Resources\InscripcionResource\Pages;
use App\Filament\Tesorero\Resources\InscripcionResource\RelationManagers;
use App\Models\Inscripcion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class InscripcionResource extends Resource
{
    protected static ?string $model = Inscripcion::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';


    protected static ?string $label = 'Inscripción';

    protected static ?string $pluralLabel = 'Inscripciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('usuario_id')
                    ->label('Usuario')
                    ->relationship('usuario', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->name} {$record->apellido}") // Mostrar nombre y apellido juntos
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre')
                            ->required(),
                        Forms\Components\TextInput::make('apellido')
                            ->label('Apellido')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('password')
                            ->label('Contraseña')
                            ->password()
                            ->required(),
                    ]),

                Forms\Components\Select::make('juego_id')
                    ->label('Juego')
                    ->relationship('juego', 'nombre')
                    ->searchable()
                    ->preload()
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
                            ->relationship('lider', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Forms\Components\MultiSelect::make('integrantes') // Seleccionar múltiples usuarios
                            ->label('Integrantes')
                            ->options(\App\Models\User::pluck('name', 'id')) // Opciones de usuarios registrados
                            ->required()
                            ->maxItems(4), // Límite de integrantes
                    ]),

                Forms\Components\Select::make('tipo')
                    ->label('Tipo de inscripción')
                    ->options([
                        'Individual' => 'Individual',
                        'Grupo' => 'Grupo',
                    ])
                    ->required(),

                Forms\Components\Select::make('estado_pago')
                    ->label('Estado del Pago')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'aprobado' => 'Aprobado',
                        'rechazado' => 'Rechazado',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('numero_comprobante')
                    ->label('Número de Comprobante')
                    ->numeric()
                    ->required()
                    ->placeholder('Ejemplo: 123456789'),

                Forms\Components\FileUpload::make('imagen_comprobante')
                    ->label('Comprobante')
                    ->disk('s3')
                    ->visibility('private')
                    ->directory('comprobantes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usuario')
                    ->label('Usuario')
                    ->formatStateUsing(fn($record) => "{$record->usuario->name} {$record->usuario->apellido}")
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('juego.nombre')
                    ->label('Juego')
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
                    ->sortable(),

                Tables\Columns\TextColumn::make('numero_comprobante')
                    ->label('N° Comprobante')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('imagen_comprobante')
                    ->label('Comprobante')
                    ->size(60)
                    ->disk('s3')
                    ->url(fn($record) => $record->imagen_comprobante ? Storage::url($record->imagen_comprobante) : null)
                    ->openUrlInNewTab(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
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
            'index' => Pages\ListInscripcions::route('/'),
            'create' => Pages\CreateInscripcion::route('/create'),
            'edit' => Pages\EditInscripcion::route('/{record}/edit'),
            'view' => Pages\ViewInscripcion::route('/{record}'),
        ];
    }
}
