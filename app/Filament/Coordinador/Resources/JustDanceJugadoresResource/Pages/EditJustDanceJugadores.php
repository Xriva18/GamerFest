<?php

namespace App\Filament\Coordinador\Resources\JustDanceJugadoresResource\Pages;

use App\Filament\Coordinador\Resources\JustDanceJugadoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJustDanceJugadores extends EditRecord
{
    protected static string $resource = JustDanceJugadoresResource::class;

    protected function getHeaderActions(): array
    {
        /*return [
            Actions\DeleteAction::make(),
        ];*/
    }
}
