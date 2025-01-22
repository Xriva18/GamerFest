<?php

namespace App\Filament\Coordinador\Resources\JuegoEa25Resource\Pages;

use App\Filament\Coordinador\Resources\JuegoEa25Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJuegoEa25s extends ListRecords
{
    protected static string $resource = JuegoEa25Resource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }*/
}
