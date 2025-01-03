<?php

namespace App\Filament\Tesorero\Resources;

use App\Filament\Tesorero\Resources\InscripcionResource\Pages;
use App\Filament\Tesorero\Resources\InscripcionResource\RelationManagers;
use App\Models\Inscripcion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class InscripcionResource extends Resource
{
    protected static ?string $model = Inscripcion::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('usuario_id')
                    ->label('Usuario')
                    ->relationship('usuario', 'name')
                    ->searchable()
                    ->required()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('password')
                            ->label('Contraseña')
                            ->password()
                            ->required(),
                    ]), // Permite ingresar manualmente un usuario
                Forms\Components\Select::make('juego_id')
                    ->label('Juego')
                    ->relationship('juego', 'nombre')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('equipo_id')
                    ->label('Equipo')
                    ->relationship('equipo', 'nombre')
                    ->nullable(),
                Forms\Components\TextInput::make('tipo')
                    ->label('Tipo de inscripción')
                    ->required()
                    ->regex('/^[a-zA-Z\s]+$/') // Solo letras y espacios
                    ->placeholder('Ejemplo: Individual o Grupo'),
                Forms\Components\Select::make('estado_pago')
                    ->label('Estado del Pago')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'aprobado' => 'Aprobado',
                        'rechazado' => 'Rechazado',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('imagen_comprobante')
                    ->label('Comprobante')
                    ->directory('comprobantes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usuario.name')
                    ->label('Usuario')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('juego.nombre')
                    ->label('Juego')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('equipo.nombre')
                    ->label('Equipo')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state ?? 'Sin equipo'),
                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo de inscripción')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('estado_pago')
                    ->label('Estado del pago')
                    ->colors([
                        'success' => 'aprobado',
                        'danger' => 'rechazado',
                        'warning' => 'pendiente',
                    ])
                    ->sortable()
                    ->searchable(),
                    Tables\Columns\ImageColumn::make('imagen_comprobante')
                    ->label('Comprobante')
                    ->size(60) // Tamaño de la miniatura
                    ->url(fn ($record) => $record->imagen_comprobante ? Storage::url($record->imagen_comprobante) : null) // Genera la URL pública
                    ->openUrlInNewTab(), // Abrir en una nueva pestaña                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(), // Habilita la acción de ver
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInscripcions::route('/'),
            'create' => Pages\CreateInscripcion::route('/create'),
            'edit' => Pages\EditInscripcion::route('/{record}/edit'),
            'view' => Pages\ViewInscripcion::route('/{record}'),
        ];
    }    
}
