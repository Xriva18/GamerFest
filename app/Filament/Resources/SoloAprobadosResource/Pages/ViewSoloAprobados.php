<?php

namespace App\Filament\Resources\SoloAprobadosResource\Pages;

use App\Filament\Resources\SoloAprobadosResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSoloAprobados extends ViewRecord
{
    protected static string $resource = SoloAprobadosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
