<?php

namespace App\Filament\Tesorero\Resources\PagoResource\Pages;

use App\Filament\Tesorero\Resources\PagoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPagos extends ListRecords
{
    protected static string $resource = PagoResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
