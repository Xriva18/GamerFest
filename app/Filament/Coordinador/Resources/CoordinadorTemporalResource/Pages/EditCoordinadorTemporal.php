<?php

namespace App\Filament\Coordinador\Resources\CoordinadorTemporalResource\Pages;

use App\Filament\Coordinador\Resources\CoordinadorTemporalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoordinadorTemporal extends EditRecord
{
    protected static string $resource = CoordinadorTemporalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
