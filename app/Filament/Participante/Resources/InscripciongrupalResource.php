<?php

namespace App\Filament\Participante\Resources;

use App\Filament\Participante\Resources\InscripciongrupalResource\Pages;
use App\Models\Inscripcion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InscripciongrupalResource extends Resource
{
    protected static ?string $model = Inscripcion::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $label = 'Inscripción Grupal';

    protected static ?string $pluralLabel = 'Inscripciones Grupales';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('usuario')
                    ->label('Usuario')
                    ->default(auth()->user()->name . ' ' . auth()->user()->apellido) // Mostrar el nombre del usuario autenticado
                    ->disabled() // Solo lectura, pero visible
                    ->dehydrated(false), // No enviar al backend, ya que `usuario_id` se asigna automáticamente
    
                // Campo oculto para el tipo de inscripción
                Forms\Components\Hidden::make('tipo')
                    ->default('Grupal') // Valor predeterminado
                    ->dehydrated(true), // Enviar al backend
    
                Forms\Components\Select::make('juego_id')
                    ->label('Nombre del Juego')
                    ->relationship('juego', 'nombre')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione una opción') // Placeholder
                    ->required(),
    
                Forms\Components\Select::make('equipo_id')
                    ->label('Equipo')
                    ->relationship('equipo', 'nombre')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione una opción') // Placeholder para Equipo
                    ->nullable(),
    
                Forms\Components\TextInput::make('estado_pago')
                    ->label('Estado del Pago')
                    ->default('pendiente') // Valor predeterminado
                    ->disabled() // Campo visible pero no editable
                    ->dehydrated(true), // Enviar al backend
    
                Forms\Components\TextInput::make('numero_comprobante')
                    ->label('Número de Comprobante')
                    ->placeholder('Ejemplo: 123456789') // Placeholder
                    ->required()
                    ->maxLength(255),
    
                Forms\Components\FileUpload::make('imagen_comprobante')
                    ->label('Comprobante')
                    ->disk('s3')
                    ->visibility('private')
                    ->directory('comprobantes')
                    ->required(),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->query(fn() => Inscripcion::where('tipo', 'Grupo') // Filtrar inscripciones grupales
                ->where('usuario_id', Auth::id()) // Filtrar por usuario autenticado
            )
            ->columns([
                Tables\Columns\TextColumn::make('usuario')
                    ->label('Usuario')
                    ->formatStateUsing(fn($record) => "{$record->usuario->name} {$record->usuario->apellido}")
                    ->sortable()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('juego.imagen')
                    ->label('Imagen del Juego')
                    ->size(60)
                    ->url(fn($record) => $record->juego->imagen ? Storage::url($record->juego->imagen) : null)
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

                Tables\Columns\ImageColumn::make('imagen_comprobante')
                    ->label('Comprobante')
                    ->size(60)
                    ->disk('s3')
                    ->url(fn($record) => $record->imagen_comprobante ? Storage::url($record->imagen_comprobante) : null)
                    ->openUrlInNewTab(),
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
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
