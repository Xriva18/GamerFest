<?php

namespace App\Filament\Coordinador\Resources\JuegoValorantResource\Pages;

use App\Filament\Coordinador\Resources\JuegoValorantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJuegoValorant extends EditRecord
{
    protected static string $resource = JuegoValorantResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }*/
}
