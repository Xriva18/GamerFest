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
        // El formulario no es necesario para este caso
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(fn () => Inscripcion::where('usuario_id', Auth::id())) // Filtra por usuario actual
            ->columns([
    
                Tables\Columns\ImageColumn::make('juego.imagen')
                    ->label('')
                    ->disk('s3') // Cambia el disco si es necesario
                    ->size(60) // Tamaño de la miniatura
                    ->url(fn ($record) => $record->juego->imagen ? Storage::url($record->juego->imagen) : null) // Genera la URL si está disponible
                    ->openUrlInNewTab(), // Permite abrir la imagen en una nueva pestaña
    
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
            ])
            ->filters([
                // Si necesitas filtros adicionales, puedes configurarlos aquí
            ])
            ->actions([]) // Sin acciones como editar o ver
            ->bulkActions([]); // Deshabilitar acciones masivas
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInscripcions::route('/'),
        ];
    }
}
