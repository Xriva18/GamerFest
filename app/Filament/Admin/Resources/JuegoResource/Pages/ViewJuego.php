<?php

namespace App\Filament\Resources\JuegoResource\Pages;

use App\Filament\Resources\JuegoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewJuego extends ViewRecord
{
    protected static string $resource = JuegoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
