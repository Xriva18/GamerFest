<?php

namespace App\Filament\Coordinador\Resources\GestionParticipanteResource\Pages;

use App\Filament\Coordinador\Resources\GestionParticipanteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGestionParticipante extends ViewRecord
{
    protected static string $resource = GestionParticipanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
