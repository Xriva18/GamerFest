<?php

namespace App\Filament\Coordinador\Resources;

use App\Filament\Coordinador\Resources\JuegoEa25Resource\Pages;
use App\Filament\Coordinador\Resources\JuegoEa25Resource\RelationManagers;
use App\Models\JuegoEa25;
use App\Models\BaseCoordinadorJuego;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JuegoEa25Resource extends Resource
{
    protected static ?string $model = BaseCoordinadorJuego::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    protected static ?string $label = 'Fc 25';
    protected static ?string $pluralLabel = 'Fc 25';



    public static function canViewAny(): bool
    {
        // Solo el coordinador con ID 12 puede acceder
        return auth()->check() && auth()->user()->id === 12;
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        // Mostrar solo el juego con ID 1
        return parent::getEloquentQuery()->where('id', 2);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre:')
                    ->required()
                    ->disabled()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('imagen')
                    ->label('Imagen')
                    ->image() // Habilita solo archivos de imagen
                    ->disk('s3') // Almacena la imagen en S3
                    ->directory('juegos') // Carpeta donde se almacenará la imagen en storage/app/public/juegos
                    ->visibility('private') // Permite que la imagen sea accesible públicamente
                    ->required(), // Si deseas que sea obligatorio
                Forms\Components\TextInput::make('precio')
                    ->label('Precio')
                    ->numeric() // Permite solo números
                    ->prefix('$') // Muestra el signo de dólar como prefijo
                    ->disabled()
                    ->rules(['regex:/^\d+(\.\d{1,2})?$/']) // Valida hasta 2 decimales
                    ->placeholder('0.00'),
                Forms\Components\DateTimePicker::make('horario'),
                Forms\Components\TextInput::make('lugar')
                    ->required(),
                Forms\Components\Select::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'Individual' => 'Individual',
                        'Grupal' => 'Grupal',
                    ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state === 'Grupal') {
                            $set('cantidad_participantes', null);
                        }
                    })
                    ->disabled(),
                Forms\Components\TextInput::make('cantidad_participantes')
                    ->label('Cantidad de participantes')
                    ->numeric()
                    ->required(fn(callable $get) => $get('tipo') === 'Grupal')
                    ->hidden(fn(callable $get) => $get('tipo') !== 'Grupal')
                    ->disabled(),
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
                    ->disabled(),
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
                    ->label('Logo')
                    ->disk('s3')
                    ->size(100),
                Tables\Columns\TextColumn::make('precio')
                    ->label('Precio')
                    ->numeric() // Asegura que la columna interprete el valor como numérico
                    ->sortable() // Permite ordenar por este campo
                    ->formatStateUsing(fn(string|int|float|null $state): string => '$' . number_format($state, 2)), // Formatea el precio con el signo $ y 2 decimales
                Tables\Columns\TextColumn::make('tipo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('horario')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cantidad_participantes')
                    ->label('Jugadores')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListJuegoEa25s::route('/'),
            'create' => Pages\CreateJuegoEa25::route('/create'),
            'edit' => Pages\EditJuegoEa25::route('/{record}/edit'),
        ];
    }
}
