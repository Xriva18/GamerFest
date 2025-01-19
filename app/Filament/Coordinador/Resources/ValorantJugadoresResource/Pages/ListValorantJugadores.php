<?php

namespace App\Filament\Coordinador\Resources\ValorantJugadoresResource\Pages;

use App\Filament\Coordinador\Resources\ValorantJugadoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListValorantJugadores extends ListRecords
{
    protected static string $resource = ValorantJugadoresResource::class;

    protected function getHeaderActions(): array
    {
        /*return [
            Actions\CreateAction::make(),
        ];*/
    }
}
