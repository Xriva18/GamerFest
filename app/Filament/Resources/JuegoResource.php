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
use Filament\Forms\Components\TextInput;

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
                    ->label('Precio')
                    ->numeric() // Permite solo números
                    ->prefix('$') // Muestra el signo de dólar como prefijo
                    ->required()
                    ->rules(['regex:/^\d+(\.\d{1,2})?$/']) // Valida hasta 2 decimales
                    ->placeholder('0.00'),
                Forms\Components\TextInput::make('cantidad_participantes')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('horario'),
                Forms\Components\Textarea::make('lugar')
                    ->columnSpanFull(),
                Forms\Components\Select::make('tipo')
                    ->label('Tipo')
                    ->options([
                    'Individual' => 'Individual',
                    'Grupal' => 'Grupal',
                    ])
                    ->required(),
                Forms\Components\Select::make('coordinador_id')
                ->label('Coordinador')
                ->options(
                    \App\Models\CoordinadorTemporal::query()
                        ->get()
                        ->mapWithKeys(function ($coordinador) {
                            return [
                                $coordinador->id_cod => $coordinador->nombre_cod . ' ' . $coordinador->apellido_cod,
                            ];
                        })
                )
                ->searchable() // Permite buscar por nombre o apellido
                ->required(),
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
                Tables\Columns\TextColumn::make('precio')
                ->label('Precio')
                ->numeric() // Asegura que la columna interprete el valor como numérico
                ->sortable() // Permite ordenar por este campo
                ->formatStateUsing(fn (string|int|float|null $state): string => '$' . number_format($state, 2)), // Formatea el precio con el signo $ y 2 decimales
                Tables\Columns\TextColumn::make('tipo')
                ->numeric()
                ->sortable(),
                Tables\Columns\TextColumn::make('horario')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('coordinadorTemporal.nombre_completo')
                    ->label('Coordinador')
                    ->sortable()
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
            'index' => Pages\ListJuegos::route('/'),
            'create' => Pages\CreateJuego::route('/create'),
            'edit' => Pages\EditJuego::route('/{record}/edit'),
        ];
    }
}
