<?php

namespace App\Filament\Coordinador\Resources\JuegoMarioKartResource\Pages;

use App\Filament\Coordinador\Resources\JuegoMarioKartResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJuegoMarioKarts extends ListRecords
{
    protected static string $resource = JuegoMarioKartResource::class;

    /* protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }*/
}
