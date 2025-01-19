<?php

namespace App\Filament\Coordinador\Resources;

use App\Filament\Coordinador\Resources\ValorantJugadoresResource\Pages;
use App\Filament\Coordinador\Resources\ValorantJugadoresResource\RelationManagers;
use App\Models\ValorantJugadores;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ValorantJugadoresResource extends Resource
{
    protected static ?string $model = ValorantJugadores::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    protected static ?string $label = 'Participantes Inscritos';
    protected static ?string $pluralLabel = 'Participantes Inscritos';



    public static function canViewAny(): bool
    {
        // Solo el coordinador con ID 12 puede acceder
        return auth()->check() && auth()->user()->id === 16;
    }



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
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('jugador_nombre_completo')->label('Nombre Completo')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('equipo_nombre')->label('Equipo')->sortable()->searchable(),
            ])
            ->defaultSort('id')
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListValorantJugadores::route('/'),
            //'create' => Pages\CreateValorantJugadores::route('/create'),
            //'edit' => Pages\EditValorantJugadores::route('/{record}/edit'),
        ];
    }
}
