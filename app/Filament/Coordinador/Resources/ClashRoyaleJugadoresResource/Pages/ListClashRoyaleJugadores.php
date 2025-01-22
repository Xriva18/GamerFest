<?php

namespace App\Filament\Coordinador\Resources\ClashRoyaleJugadoresResource\Pages;

use App\Filament\Coordinador\Resources\ClashRoyaleJugadoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClashRoyaleJugadores extends ListRecords
{
    protected static string $resource = ClashRoyaleJugadoresResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }*/
}
