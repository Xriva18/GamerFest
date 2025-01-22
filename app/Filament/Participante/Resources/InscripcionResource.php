<?php

namespace App\Filament\Participante\Resources;

use App\Filament\Participante\Resources\InscripcionResource\Pages;
use App\Models\Inscripcion;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth; // Para obtener el usuario autenticado
use Illuminate\Support\Facades\Storage;

class InscripcionResource extends Resource
{
    protected static ?string $model = Inscripcion::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $label = 'Inscripción';

    protected static ?string $pluralLabel = 'Inscripciones';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('usuario')
                    ->label('Usuario')
                    ->default(Auth::user()->name . ' ' . Auth::user()->apellido) // Mostrar el nombre del usuario autenticado
                    ->disabled() // Deshabilitar para que no sea editable
                    ->dehydrated(false), // No enviar este campo al backend

                Forms\Components\Select::make('juego_id')
                    ->label('Nombre del Juego')
                    ->relationship('juego', 'nombre')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione una opción') // Placeholder para Nombre del Juego
                    ->required(),

                // Campo oculto para el tipo de inscripción
                Forms\Components\Hidden::make('tipo')
                    ->default('Individual') // Valor predeterminado
                    ->dehydrated(true), // Enviar este campo al backend

                Forms\Components\TextInput::make('estado_pago')
                    ->label('Estado del Pago')
                    ->default('Pendiente') // Valor predeterminado
                    ->disabled() // Deshabilitar para que no sea editable
                    ->dehydrated(true), // Enviar este campo al backend

                Forms\Components\TextInput::make('numero_comprobante')
                    ->label('Número de Comprobante')
                    ->placeholder('Ejemplo: 123456789') // Agregar un placeholder
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
            ->query(fn() => Inscripcion::where('usuario_id', Auth::id()))
            ->columns([
                Tables\Columns\ImageColumn::make('juego.imagen')
                    ->disk('s3')
                    ->size(60)
                    ->label('') // Eliminamos el título de la columna
                    ->url(fn($record) => $record->juego->imagen ? Storage::url($record->juego->imagen) : null)
                    ->openUrlInNewTab(),

                Tables\Columns\TextColumn::make('juego.nombre')
                    ->label('Juego')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo de inscripción')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('estado_pago')
                    ->label('Estado del Pago')
                    ->colors([
                        'success' => 'aprobado',
                        'danger' => 'rechazado',
                        'warning' => 'pendiente',
                    ])
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('numero_comprobante')
                    ->label('Número de Comprobante')
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
            'index' => Pages\ListInscripcions::route('/'),
            'create' => Pages\CreateInscripcion::route('/create'),
            'edit' => Pages\EditInscripcion::route('/{record}/edit'),
        ];
    }
}
