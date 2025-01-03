<?php

namespace App\Filament\Coordinador\Resources;

use App\Filament\Coordinador\Resources\GestionCoordinadorResource\Pages;
use App\Filament\Coordinador\Resources\GestionCoordinadorResource\RelationManagers;
use App\Models\GestionCoordinador;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GestionCoordinadorResource extends Resource
{
    public static function query(\Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        // Filtrar por el coordinador que ha iniciado sesión
        return $query->where('coordinador_id', auth()->coordinador_id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('juego_id')
                    ->relationship('juego', 'nombre')
                    ->label('Juego')
                    ->required(),

                Forms\Components\Select::make('coordinador_id')
                    ->relationship('coordinador', 'nombre_cod')
                    ->label('Coordinador')
                    ->required()
                    ->default(auth()->coordinador_id)
                    ->disabled(), // Deshabilitado para evitar cambios
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('juego.nombre')
                    ->label('Juego')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('coordinador.nombre_cod')
                    ->label('Nombre del Coordinador'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGestionCoordinadors::route('/'),

        ];
    }
}
