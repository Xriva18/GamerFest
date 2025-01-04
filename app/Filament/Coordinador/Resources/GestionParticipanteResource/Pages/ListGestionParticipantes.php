<?php

namespace App\Filament\Coordinador\Resources\GestionParticipanteResource\Pages;

use App\Filament\Coordinador\Resources\GestionParticipanteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGestionParticipantes extends ListRecords
{
    protected static string $resource = GestionParticipanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
