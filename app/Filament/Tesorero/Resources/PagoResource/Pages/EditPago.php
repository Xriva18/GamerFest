<?php

namespace App\Filament\Tesorero\Resources\PagoResource\Pages;

use App\Filament\Tesorero\Resources\PagoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPago extends EditRecord
{
    protected static string $resource = PagoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
