<?php

namespace App\Filament\Coordinador\Resources\JuegoClashRoyaleResource\Pages;

use App\Filament\Coordinador\Resources\JuegoClashRoyaleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJuegoClashRoyales extends ListRecords
{
    protected static string $resource = JuegoClashRoyaleResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }*/
}
