<?php

namespace App\Filament\Resources\AuspiciantesResource\Pages;

use App\Filament\Resources\AuspiciantesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAuspiciantes extends ViewRecord
{
    protected static string $resource = AuspiciantesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
