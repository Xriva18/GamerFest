<?php

namespace App\Filament\Coordinador\Resources\CoordinadorTemporalResource\Pages;

use App\Filament\Coordinador\Resources\CoordinadorTemporalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoordinadorTemporals extends ListRecords
{
    protected static string $resource = CoordinadorTemporalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
