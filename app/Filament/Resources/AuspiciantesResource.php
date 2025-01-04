<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuspiciantesResource\Pages;
use App\Filament\Resources\AuspiciantesResource\RelationManagers;
use App\Models\Auspiciantes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;

class AuspiciantesResource extends Resource
{
    protected static ?string $model = Auspiciantes::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre:')
                    ->required(),
                Forms\Components\TextInput::make('aportacion')
                    ->label('Aportación:')
                    ->numeric() // Permite solo números
                    ->prefix('$') // Muestra el signo de dólar como prefijo
                    ->required()
                    ->rules(['regex:/^\d+(\.\d{1,2})?$/']) // Valida hasta 2 decimales
                    ->placeholder('0.00'),
                Forms\Components\FileUpload::make('imagen')
                    ->label('Logo:')
                    ->disk('s3')
                    ->directory('auspiciantes') // Fuerza a usar una carpeta en S3
                    ->visibility('private')      // Importante si quieres servir la imagen públicamente
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('imagen')
                    ->label('')
                    ->size(100)
                    ->disk('s3'), // Especifica el disco si es necesario,
                Tables\Columns\TextColumn::make('aportacion')
                    ->label('Aportación')
                    ->numeric() // Asegura que la columna interprete el valor como numérico
                    ->sortable() // Permite ordenar por este campo
                    ->formatStateUsing(fn(string|int|float|null $state): string => '$' . number_format($state, 2)), // Formatea el precio con el signo $ y 2 decimales
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAuspiciantes::route('/'),
            'create' => Pages\CreateAuspiciantes::route('/create'),
            'view' => Pages\ViewAuspiciantes::route('/{record}'),
            'edit' => Pages\EditAuspiciantes::route('/{record}/edit'),
        ];
    }
}
