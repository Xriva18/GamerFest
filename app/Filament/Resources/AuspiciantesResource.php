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

class AuspiciantesResource extends Resource
{
    protected static ?string $model = Auspiciantes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('nombre')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('imagen')
                    ->label('Imagen')
                    ->image() // Habilita solo archivos de imagen
                    ->directory('auspiciantes') // Carpeta donde se almacenará la imagen en storage/app/public/auspiciantes
                    ->required(), // Si deseas que sea obligatorio
                Forms\Components\TextInput::make('aportacion')
                    ->label('aportacion')
                    ->numeric() // Permite solo números
                    ->prefix('$') // Muestra el signo de dólar como prefijo
                    ->required()
                    ->rules(['regex:/^\d+(\.\d{1,2})?$/']) // Valida hasta 2 decimales
                    ->placeholder('0.00'),
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
                    ->size(100),
                Tables\Columns\TextColumn::make('aportacion')
                    ->label('aportacion')
                    ->numeric() // Asegura que la columna interprete el valor como numérico
                    ->sortable() // Permite ordenar por este campo
                    ->formatStateUsing(fn (string|int|float|null $state): string => '$' . number_format($state, 2)), // Formatea el precio con el signo $ y 2 decimales
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
            'index' => Pages\ListAuspiciantes::route('/'),
            'create' => Pages\CreateAuspiciantes::route('/create'),
            'view' => Pages\ViewAuspiciantes::route('/{record}'),
            'edit' => Pages\EditAuspiciantes::route('/{record}/edit'),
        ];
    }
}
