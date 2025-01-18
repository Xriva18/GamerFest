<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SoloAprobadosResource\Pages;
use App\Filament\Resources\SoloAprobadosResource\RelationManagers;
use App\Models\SoloAprobados;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SoloAprobadosResource extends Resource
{
    protected static ?string $model = SoloAprobados::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    protected static ?string $label = 'Aprobados';

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
                Tables\Columns\TextColumn::make('usuario_nombre_completo')
                    ->label('Usuario')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('coordinador_nombre_completo')
                    ->label('Coordinador')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('equipo_nombre')
                    ->label('Equipo')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('juego_nombre')
                    ->label('Juego')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\ViewAction::make(),
                //Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\BulkActionGroup::make([
                //    Tables\Actions\DeleteBulkAction::make(),
                //]),
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
            'index' => Pages\ListSoloAprobados::route('/'),
            //'create' => Pages\CreateSoloAprobados::route('/create'),
            //'view' => Pages\ViewSoloAprobados::route('/{record}'),
            //'edit' => Pages\EditSoloAprobados::route('/{record}/edit'),
        ];
    }
}
