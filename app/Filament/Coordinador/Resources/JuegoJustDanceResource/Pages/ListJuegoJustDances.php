<?php

namespace App\Filament\Coordinador\Resources\JuegoJustDanceResource\Pages;

use App\Filament\Coordinador\Resources\JuegoJustDanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJuegoJustDances extends ListRecords
{
    protected static string $resource = JuegoJustDanceResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }*/
}
