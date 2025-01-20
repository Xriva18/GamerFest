<?php

namespace App\Filament\Coordinador\Resources\ClashRoyaleJugadoresResource\Pages;

use App\Filament\Coordinador\Resources\ClashRoyaleJugadoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClashRoyaleJugadores extends EditRecord
{
    protected static string $resource = ClashRoyaleJugadoresResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }*/
}
