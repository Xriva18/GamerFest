<?php

namespace App\Filament\Participante\Resources;

use App\Filament\Participante\Resources\InscripciongrupalResource\Pages;
use App\Filament\Participante\Resources\InscripciongrupalResource\RelationManagers;
use App\Models\Inscripcion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class InscripciongrupalResource extends Resource
{
    protected static ?string $model = Inscripciongrupal::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $label = 'Inscripción Grupal';

    protected static ?string $pluralLabel = 'Inscripciones Grupales';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(fn () => Inscripcion::where('tipo', 'Grupo') // Filtra solo inscripciones grupales
                ->where('usuario_id', auth()->id()) // Filtra solo inscripciones del usuario autenticado
            )
            ->columns([
                // Columna para mostrar el nombre completo del usuario
                Tables\Columns\TextColumn::make('usuario')
                    ->label('Usuario')
                    ->formatStateUsing(fn ($record) => "{$record->usuario->name} {$record->usuario->apellido}")
                    ->sortable()
                    ->searchable(),
    
                // Columna para mostrar la imagen del juego
                Tables\Columns\ImageColumn::make('juego.imagen')
                    ->label('Imagen del Juego')
                    ->size(60)
                    ->url(fn ($record) => $record->juego->imagen ? Storage::url($record->juego->imagen) : null)
                    ->openUrlInNewTab(),
    
                // Columna para mostrar el nombre del juego
                Tables\Columns\TextColumn::make('juego.nombre')
                    ->label('Nombre del Juego')
                    ->sortable()
                    ->searchable(),
    
                // Columna para mostrar el tipo de inscripción
                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo de inscripción')
                    ->sortable(),
    
                // Columna para mostrar el estado del pago
                Tables\Columns\BadgeColumn::make('estado_pago')
                    ->label('Estado del Pago')
                    ->colors([
                        'success' => 'aprobado',
                        'danger' => 'rechazado',
                        'warning' => 'pendiente',
                    ])
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([]) // No hay filtros adicionales
            ->actions([]) // Sin acciones
            ->bulkActions([]); // Sin acciones masivas
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
            'index' => Pages\ListInscripcionGrupals::route('/'), // Solo página de listado
        ];
    }
}
