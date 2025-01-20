<?php

namespace App\Filament\Coordinador\Resources;

use App\Filament\Coordinador\Resources\EnfrentamientoResource\Pages;
use App\Models\Enfrentamiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EnfrentamientoResource extends Resource
{
    protected static ?string $model = Enfrentamiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('jugador1')
                    ->label('Jugador 1')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('jugador2')
                    ->label('Jugador 2')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('equipo1')
                    ->label('Equipo 1')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('equipo2')
                    ->label('Equipo 2')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('juego_id')
                    ->label('Juego')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('jugador1')->label('Jugador 1')->sortable(),
                Tables\Columns\TextColumn::make('jugador2')->label('Jugador 2')->sortable(),
                Tables\Columns\TextColumn::make('equipo1')->label('Equipo 1')->sortable()->formatStateUsing(fn($state) => \App\Models\Equipo::find($state)?->nombre),
                Tables\Columns\TextColumn::make('equipo2')->label('Equipo 2')->sortable()->formatStateUsing(fn($state) => \App\Models\Equipo::find($state)?->nombre),
                Tables\Columns\TextColumn::make('juego_id')->label('Juego')->sortable()->formatStateUsing(fn($state) => \App\Models\Juego::find($state)?->nombre),
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
            'index' => Pages\ListEnfrentamientos::route('/'),
            'create' => Pages\CreateEnfrentamiento::route('/create'),
            'edit' => Pages\EditEnfrentamiento::route('/{record}/edit'),
        ];
    }
}
