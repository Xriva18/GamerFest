<?php

namespace App\Filament\Coordinador\Resources\GestionParticipanteResource\Pages;

use App\Filament\Coordinador\Resources\GestionParticipanteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGestionParticipante extends EditRecord
{
    protected static string $resource = GestionParticipanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
