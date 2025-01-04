<?php

namespace App\Filament\Coordinador\Resources\GestionCoordinadorResource\Pages;

use App\Filament\Coordinador\Resources\GestionCoordinadorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGestionCoordinador extends ViewRecord
{
    protected static string $resource = GestionCoordinadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
