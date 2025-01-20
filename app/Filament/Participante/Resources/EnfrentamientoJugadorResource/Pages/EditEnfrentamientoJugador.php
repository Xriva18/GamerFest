<?php

namespace App\Filament\Participante\Resources\EnfrentamientoJugadorResource\Pages;

use App\Filament\Participante\Resources\EnfrentamientoJugadorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnfrentamientoJugador extends EditRecord
{
    protected static string $resource = EnfrentamientoJugadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
