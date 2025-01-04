<?php

namespace App\Filament\Tesorero\Resources\GastoingresoResource\Pages;

use App\Filament\Tesorero\Resources\GastoingresoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGastoingreso extends EditRecord
{
    protected static string $resource = GastoingresoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
