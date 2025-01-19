<?php

namespace App\Filament\Coordinador\Resources\MortalKombatJugadoresResource\Pages;

use App\Filament\Coordinador\Resources\MortalKombatJugadoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMortalKombatJugadores extends EditRecord
{
    protected static string $resource = MortalKombatJugadoresResource::class;

    protected function getHeaderActions(): array
    {
        /*return [
            Actions\DeleteAction::make(),
        ];*/
    }
}
