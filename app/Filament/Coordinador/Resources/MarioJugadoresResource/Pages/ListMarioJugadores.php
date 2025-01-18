<?php

namespace App\Filament\Coordinador\Resources\MarioJugadoresResource\Pages;

use App\Filament\Coordinador\Resources\MarioJugadoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMarioJugadores extends ListRecords
{
    protected static string $resource = MarioJugadoresResource::class;

    protected function getHeaderActions(): array
    {
        /*return [
            Actions\CreateAction::make(),
        ];*/
    }
}
