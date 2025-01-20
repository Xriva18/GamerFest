<?php

namespace App\Filament\Coordinador\Resources;

use App\Filament\Coordinador\Resources\EnfrentamientoResource\Pages;
use App\Models\Enfrentamiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Juego;

class EnfrentamientoResource extends Resource
{
    protected static ?string $model = Enfrentamiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getEloquentQuery(): Builder
    {
        // 1. Obtener el usuario autenticado.
        $user = auth()->user();

        // Validar que exista un usuario autenticado.
        if (!$user) {
            // Si no hay usuario, podría devolver un query vacío o manejarlo de la forma que necesites.
            return parent::getEloquentQuery()->whereRaw('1 = 0');
        }

        // 2. Buscar en la tabla "juegos" el id cuyo "coordinador_id" coincida con el id del usuario.
        $juegoId = Juego::query()
            ->where('coordinador_id', $user->id)
            ->value('id');

        // Si no se encuentra ningún juego, se puede definir un comportamiento alternativo.
        if (!$juegoId) {
            // Por ejemplo, devolver un query sin resultados:
            return parent::getEloquentQuery()->whereRaw('1 = 0');
        }

        // 3. Retornar la query filtrada por el juego_id obtenido.
        return parent::getEloquentQuery()->where('juego_id', $juegoId);
    }



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
                Tables\Columns\TextColumn::make('jugador1')->label('Jugador 1')
                    ->sortable()
                    ->formatStateUsing(function ($state, $record) {
                        // Se usa la relación "participante1"
                        $participante = $record->participante1;
                        if ($participante && $participante->usuario) {
                            return $participante->usuario->name . ' ' . $participante->usuario->apellido;
                        }
                        return 'No asignado';
                    }),
                Tables\Columns\TextColumn::make('jugador2')->label('Jugador 2')
                    ->sortable()
                    ->formatStateUsing(function ($state, $record) {
                        // Se usa la relación "participante2"
                        $participante = $record->participante2;
                        if ($participante && $participante->usuario) {
                            return $participante->usuario->name . ' ' . $participante->usuario->apellido;
                        }
                        return 'No asignado';
                    }),
                Tables\Columns\TextColumn::make('equipo1')->label('Equipo 1')
                    ->sortable()
                    ->formatStateUsing(fn($state) => \App\Models\Equipo::find($state)?->nombre),
                Tables\Columns\TextColumn::make('equipo2')
                    ->label('Equipo 2')
                    ->sortable()
                    ->formatStateUsing(fn($state) => \App\Models\Equipo::find($state)?->nombre),
                Tables\Columns\TextColumn::make('juego_id')
                    ->label('Juego')
                    ->sortable()
                    ->formatStateUsing(fn($state) => \App\Models\Juego::find($state)?->nombre),
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
