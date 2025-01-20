<?php

namespace App\Filament\Coordinador\Resources;

use App\Filament\Coordinador\Resources\EnfrentamientoResource\Pages;
use App\Filament\Coordinador\Resources\EnfrentamientoResource\RelationManagers;
use App\Models\Enfrentamiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnfrentamientoResource extends Resource
{
    protected static ?string $model = Enfrentamiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Ejemplo: 
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('juego_id'),
                Tables\Columns\TextColumn::make('inscripcion_1_id'),
                Tables\Columns\TextColumn::make('inscripcion_2_id'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime(),
            ])
            ->filters([
                //
            ]);
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
            'index' => Pages\ListEnfrentamientos::route('/'),
            'create' => Pages\CreateEnfrentamiento::route('/create'),
            'edit' => Pages\EditEnfrentamiento::route('/{record}/edit'),
        ];
    }
}
