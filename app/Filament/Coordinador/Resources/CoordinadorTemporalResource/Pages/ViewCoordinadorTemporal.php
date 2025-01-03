<?php

namespace App\Filament\Coordinador\Resources\CoordinadorTemporalResource\Pages;

use App\Filament\Coordinador\Resources\CoordinadorTemporalResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCoordinadorTemporal extends ViewRecord
{
    protected static string $resource = CoordinadorTemporalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
