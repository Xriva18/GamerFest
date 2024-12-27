<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JuegoResource\Pages;
use App\Filament\Resources\JuegoResource\RelationManagers;
use App\Models\Juego;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JuegoResource extends Resource
{
    protected static ?string $model = Juego::class;

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
                    ->directory('juegos') // Carpeta donde se almacenará la imagen en storage/app/public/juegos
                    ->required(), // Si deseas que sea obligatorio
                Forms\Components\TextInput::make('precio')
                    ->numeric(),
                Forms\Components\TextInput::make('cantidad_participantes')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('horario'),
                Forms\Components\Textarea::make('lugar')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('tipo')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('coordinador_id')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('imagen')
                    ->label('Imagen')
                    ->size(50),
                Tables\Columns\TextColumn::make('precio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cantidad_participantes')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('horario')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('coordinador_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListJuegos::route('/'),
            'create' => Pages\CreateJuego::route('/create'),
            'edit' => Pages\EditJuego::route('/{record}/edit'),
        ];
    }
}
