<?php

namespace App\Filament\Coordinador\Resources;

use App\Filament\Coordinador\Resources\MarioJugadoresResource\Pages;
use App\Filament\Coordinador\Resources\MarioJugadoresResource\RelationManagers;
use App\Models\Participante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarioJugadoresResource extends Resource
{
    protected static ?string $model = Participante::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    protected static ?string $label = 'Participantes Inscritos';
    protected static ?string $pluralLabel = 'Participantes Inscritos';



    public static function canViewAny(): bool
    {
        // Solo el coordinador con ID 12 puede acceder
        return auth()->check() && auth()->user()->id === 8;
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        // Mostrar solo el juego con ID 1
        return parent::getEloquentQuery()->where('juego_id', 5);
    }


    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('estado_juego')
                ->label('Estado de Participación')
                ->options([
                    'jugando' => 'Jugando',
                    'Ganador' => 'Ganador',
                    'Perdedor' => 'Perdedor',
                ])
                ->required()
                ->default('jugando')
                ->visible(fn (string $context) => $context === 'edit'), // Solo visible en el contexto de edición
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usuario_id')
                ->label('Jugador')
                ->sortable()
                ->searchable()
                ->formatStateUsing(fn ($record) => $record->usuario->name . ' ' . $record->usuario->apellido),


                Tables\Columns\TextColumn::make('equipo.nombre')
                ->label('Equipo')
                ->sortable()
                ->searchable(),
                Tables\Columns\BadgeColumn::make('estado_juego')
                ->label('Estado de Participación')
                ->sortable()
                ->colors([
                    'warning' => 'jugando',     // Verde para "jugando"
                    'success' => 'Ganador',  // Amarillo para "pendiente"
                    'danger' => 'Perdedor',  // Rojo para "finalizado"
                ]),
            ])
            ->defaultSort('id')
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListMarioJugadores::route('/'),
            //'create' => Pages\CreateMarioJugadores::route('/create'),
            //'edit' => Pages\EditMarioJugadores::route('/{record}/edit'),
        ];
    }
}
