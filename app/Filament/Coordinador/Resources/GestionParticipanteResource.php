<?php

namespace App\Filament\Coordinador\Resources;

use App\Filament\Coordinador\Resources\GestionParticipanteResource\Pages;
use App\Models\GestionParticipante;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;

class GestionParticipanteResource extends Resource
{
    protected static ?string $model = GestionParticipante::class;

    protected static ?string $navigationIcon = 'heroicon-s-users'; // Cambiado de 'heroicon-o-collection' a un ícono disponible

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usuario.name')->label('Usuario'),
                Tables\Columns\TextColumn::make('juego.nombre')->label('Juego'),
                Tables\Columns\TextColumn::make('tipo')->label('Tipo'),
                Tables\Columns\TextColumn::make('estado_pago')->label('Estado de Pago'),
                Tables\Columns\TextColumn::make('created_at')->label('Creado')->date(),
            ])
            ->filters([
                SelectFilter::make('juego_id')
                    ->label('Filtrar por Juego')
                    ->relationship('juego', 'nombre') // Relación con el modelo Juego
                    ->searchable(), // Permite buscar el juego por nombre
            ]);
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('usuario_id')
                    ->label('Usuario')
                    ->relationship('usuario', 'nombre')
                    ->required(),
                Forms\Components\Select::make('juego_id')
                    ->label('Juego')
                    ->relationship('juego', 'nombre')
                    ->required(),
                Forms\Components\TextInput::make('tipo')->label('Tipo'),
                Forms\Components\Select::make('estado_pago')
                    ->label('Estado de Pago')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'completado' => 'Completado',
                    ]),
                Forms\Components\FileUpload::make('imagen_comprobante')
                    ->label('Imagen de Comprobante'),
                Forms\Components\TextInput::make('numero_comprobante')
                    ->label('Número de Comprobante'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGestionParticipantes::route('/'),
        ];
    }
}
