<?php

namespace App\Filament\Resources\SoloAprobadosResource\Pages;

use App\Filament\Resources\SoloAprobadosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoloAprobados extends EditRecord
{
    protected static string $resource = SoloAprobadosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
