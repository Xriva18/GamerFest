<?php

namespace App\Filament\Coordinador\Resources\ValorantJugadoresResource\Pages;

use App\Filament\Coordinador\Resources\ValorantJugadoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditValorantJugadores extends EditRecord
{
    protected static string $resource = ValorantJugadoresResource::class;

    protected function getHeaderActions(): array
    {
        /*return [
            Actions\DeleteAction::make(),
        ];*/
    }
}
