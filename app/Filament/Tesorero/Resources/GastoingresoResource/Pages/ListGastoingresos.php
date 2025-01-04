<?php

namespace App\Filament\Tesorero\Resources\GastoingresoResource\Pages;

use App\Filament\Tesorero\Resources\GastoingresoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGastoingresos extends ListRecords
{
    protected static string $resource = GastoingresoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
