<?php
/* 
namespace App\Filament\Coordinador\Resources;
use App\Models\Juego;
use App\Models\CoordinadorTemporal;
use App\Filament\Coordinador\Resources\GestionCoordinadorResource\Pages;
use App\Filament\Coordinador\Resources\GestionCoordinadorResource\RelationManagers;
use App\Models\GestionCoordinador;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GestionCoordinadorResource extends Resource
{
    protected static ?string $model = Juego::class;
    protected static ?string $navigationIcon = 'heroicon-s-users';

    protected static ?string $navigationLabel = 'Gestión Coordinadores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Aquí agregas los campos que necesitas para el formulario
                Forms\Components\TextInput::make('nombre')
                    ->required(),
                // Agrega más campos según lo necesites
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('coordinador')
                ->label('Coordinador')

                ->getStateUsing(function ($record) {
                    return $record->coordinador?->nombre_cod . ' ' . $record->coordinador?->apellido_cod;
                })

                ->sortable(false) // Desactivar la opción de ordenamiento
                ->searchable(false),
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Juego'),
                    //->searchable(),
                Tables\Columns\TextColumn::make('cantidad_participantes')
                    ->label('Cantidad de Participantes'),
                Tables\Columns\TextColumn::make('horario')
                    ->label('Horario'),
            ])

            ->filters([
                Tables\Filters\SelectFilter::make('coordinador_id')
                    ->label('Coordinador')
                    ->options(function () {
                        return \App\Models\CoordinadorTemporal::all()
                            ->mapWithKeys(function ($coordinador) {
                                return [
                                    $coordinador->id_cod => $coordinador->nombre_cod . ' ' . $coordinador->apellido_cod,
                                ];
                            });
                    })
                    ->default(auth()->user()->coordinador_id),
            ])
            ->actions([])
            ->bulkActions([]);
    }

    protected function getTableQuery(): Builder
    {
        return Juego::with('coordinador')
            ->where('coordinador_id', auth()->user()->coordinador_id);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGestionCoordinadors::route('/'),

        ];
    }
}*/
