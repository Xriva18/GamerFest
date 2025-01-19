<?php

namespace App\Filament\Coordinador\Resources\Ea25JugadoresResource\Pages;

use App\Filament\Coordinador\Resources\Ea25JugadoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEa25Jugadores extends EditRecord
{
    protected static string $resource = Ea25JugadoresResource::class;

    protected function getHeaderActions(): array
    {
        /*return [
            Actions\DeleteAction::make(),
        ];*/
    }
}
