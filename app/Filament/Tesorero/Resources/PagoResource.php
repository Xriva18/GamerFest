<?php

namespace App\Filament\Tesorero\Resources;

use App\Filament\Tesorero\Resources\PagoResource\Pages;
use App\Models\Pago;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class PagoResource extends Resource
{
    protected static ?string $model = Pago::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $label = 'Pago';
    
    protected static ?string $pluralLabel = 'Pagos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('participacion_id')
                    ->label('Inscripción')
                    ->relationship('inscripcion', 'id')
                    ->required(),
                Forms\Components\Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'aprobado' => 'Aprobado',
                        'rechazado' => 'Rechazado',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('numero_comprobante')
                    ->label('Número de Comprobante')
                    ->numeric() // Solo números
                    ->required()
                    ->placeholder('Ejemplo: 123456789'),
                Forms\Components\FileUpload::make('imagen_comprobante')
                    ->label('Comprobante')
                    ->image() // Muestra la vista previa
                    ->enableOpen() // Permite abrir la imagen al hacer clic
                    ->visibility('private'), // Configuración privada
                Forms\Components\DateTimePicker::make('fecha_pago')
                    ->label('Fecha del Pago')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('inscripcion.usuario.name')
                    ->label('Usuario'),
                Tables\Columns\BadgeColumn::make('estado')
                    ->label('Estado')
                    ->colors([
                        'success' => 'aprobado',
                        'danger' => 'rechazado',
                        'warning' => 'pendiente',
                    ]),
                Tables\Columns\TextColumn::make('numero_comprobante')
                    ->label('N° Comprobante')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_pago')
                    ->label('Fecha del Pago')
                    ->date(),
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
                Tables\Actions\ViewAction::make(),
            ])
            ->headerActions([]) // Deshabilitar todas las acciones de encabezado
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
            'index' => Pages\ListPagos::route('/'),
            'edit' => Pages\EditPago::route('/{record}/edit'),
            'view' => Pages\ViewPago::route('/{record}'),
        ];
    }
}
