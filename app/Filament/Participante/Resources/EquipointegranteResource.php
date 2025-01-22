<?php

namespace App\Filament\Participante\Resources;

use App\Filament\Participante\Resources\EquipointegranteResource\Pages;
use App\Models\EquipoIntegrante;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class EquipointegranteResource extends Resource
{
    protected static ?string $model = EquipoIntegrante::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $label = 'Equipo';

    protected static ?string $pluralLabel = 'Creación de Equipos';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('lider')
                    ->label('Líder del Equipo')
                    ->default(Auth::user()->name . ' ' . Auth::user()->apellido)
                    ->disabled()
                    ->dehydrated(false),

                Forms\Components\Hidden::make('lider_id')
                    ->default(Auth::id())
                    ->dehydrated(true),

                Forms\Components\TextInput::make('nombrequipo')
                    ->label('Nombre del Equipo')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('usuario_id')
                    ->label('Integrantes')
                    ->options(
                        User::query()
                            ->get()
                            ->mapWithKeys(fn($user) => [$user->id => $user->name . ' ' . $user->apellido])
                            ->toArray()
                    )
                    ->multiple()
                    ->required()
                    ->helperText('Seleccione los integrantes del equipo.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                EquipoIntegrante::query()
                    ->selectRaw('MIN(equipo_integrantes.id) as id, nombrequipo, lider_id, STRING_AGG(users.name || \' \' || users.apellido, \', \') AS integrantes')
                    ->join('users', 'equipo_integrantes.usuario_id', '=', 'users.id')
                    ->groupBy('nombrequipo', 'lider_id')
            )
            ->columns([
                // Columna del nombre del equipo
                Tables\Columns\TextColumn::make('nombrequipo')
                    ->label('Nombre del Equipo')
                    ->sortable()
                    ->searchable(),
    
                // Columna para el líder del equipo
                Tables\Columns\TextColumn::make('lider.name')
                    ->label('Líder del Equipo')
                    ->getStateUsing(function ($record) {
                        $lider = User::find($record->lider_id);
                        return $lider ? $lider->name . ' ' . $lider->apellido : 'Desconocido';
                    })
                    ->sortable()
                    ->searchable(),
    
                // Columna de los integrantes (mostrar todos en una sola celda)
                Tables\Columns\TextColumn::make('integrantes')
                    ->label('Integrantes')
                    ->getStateUsing(fn($record) => $record->integrantes ?? 'Sin Integrantes')
                    ->html()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }
    
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEquipointegrantes::route('/'),
            'create' => Pages\CreateEquipointegrante::route('/create'),
            'edit' => Pages\EditEquipointegrante::route('/{record}/edit'),
        ];
    }
}
