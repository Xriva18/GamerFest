<?php

namespace App\Filament\Coordinador\Resources\JuegoValorantResource\Pages;

use App\Filament\Coordinador\Resources\JuegoValorantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJuegoValorants extends ListRecords
{
    protected static string $resource = JuegoValorantResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }*/
}
