<?php

namespace App\Filament\Coordinador\Resources;

use App\Filament\Coordinador\Resources\CoordinadorTemporalResource\Pages;
use App\Filament\Coordinador\Resources\CoordinadorTemporalResource\RelationManagers;
use App\Models\CoordinadorTemporal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoordinadorTemporalResource extends Resource
{
    protected static ?string $model = CoordinadorTemporal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_cod')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nombre_cod')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('apellido_cod'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_cod')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_cod')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido_cod')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCoordinadorTemporals::route('/'),
            'create' => Pages\CreateCoordinadorTemporal::route('/create'),
            'view' => Pages\ViewCoordinadorTemporal::route('/{record}'),
            'edit' => Pages\EditCoordinadorTemporal::route('/{record}/edit'),
        ];
    }
}
