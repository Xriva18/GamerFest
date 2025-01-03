<?php

namespace App\Filament\Coordinador\Resources\GestionCoordinadorResource\Pages;

use App\Filament\Coordinador\Resources\GestionCoordinadorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGestionCoordinador extends EditRecord
{
    protected static string $resource = GestionCoordinadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
