<?php

namespace App\Filament\Tesorero\Resources;

use App\Filament\Tesorero\Resources\GastoingresoResource\Pages;
use App\Models\Gastoingreso;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class GastoingresoResource extends Resource
{
    protected static ?string $model = Gastoingreso::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    protected static ?string $label = 'Gasto o Ingreso'; // Singular

    protected static ?string $pluralLabel = 'Gastos e Ingresos'; // Plural

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'gasto' => 'Gasto',
                        'ingreso' => 'Ingreso',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('monto')
                    ->label('Monto')
                    ->numeric() // Solo números
                    ->required()
                    ->placeholder('Ejemplo: 1500.75'),
                Forms\Components\Textarea::make('detalle')
                    ->label('Detalle')
                    ->required()
                    ->regex('/^[\p{L}\p{N}\s.,]+$/u') // Soporte para caracteres Unicode (tildes, acentos, etc.)
                    ->placeholder('Ejemplo: Pago de materiales'),
                Forms\Components\FileUpload::make('comprobante')
                    ->label('Comprobante')
                    ->disk('s3')
                    ->visibility('private')
                    ->directory('comprobantes'),
                Forms\Components\DatePicker::make('fecha')
                    ->label('Fecha')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('tipo')
                    ->label('Tipo')
                    ->colors(['success' => 'ingreso', 'danger' => 'gasto'])
                    ->searchable(), // Habilitar búsqueda en esta columna
                Tables\Columns\TextColumn::make('monto')
                    ->label('Monto')
                    ->money('USD')
                    ->sortable()
                    ->searchable(), // Habilitar búsqueda en esta columna
                Tables\Columns\TextColumn::make('detalle')
                    ->label('Detalle')
                    ->searchable(), // Habilitar búsqueda en esta columna
                Tables\Columns\TextColumn::make('fecha')
                    ->label('Fecha')
                    ->date()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('comprobante')
                    ->label('Comprobante')
                    ->size(60) // Tamaño de la miniatura
                    ->disk('s3')
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
            ])
            ->headerActions([]) // Elimina el botón de "Create"
            ->defaultSort('fecha', 'desc'); // Orden predeterminado
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
            'index' => Pages\ListGastoingresos::route('/'),
            'create' => Pages\CreateGastoingreso::route('/create'),
            'edit' => Pages\EditGastoingreso::route('/{record}/edit'),
            'view' => Pages\ViewGastoingreso::route('/{record}'),
        ];
    }
}
