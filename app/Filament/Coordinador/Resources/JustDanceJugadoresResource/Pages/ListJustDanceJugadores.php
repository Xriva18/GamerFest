<?php

namespace App\Filament\Coordinador\Resources\JustDanceJugadoresResource\Pages;

use App\Filament\Coordinador\Resources\JustDanceJugadoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJustDanceJugadores extends ListRecords
{
    protected static string $resource = JustDanceJugadoresResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }*/
}
