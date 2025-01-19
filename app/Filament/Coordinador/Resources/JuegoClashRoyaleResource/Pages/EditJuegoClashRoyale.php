<?php

namespace App\Filament\Coordinador\Resources\JuegoClashRoyaleResource\Pages;

use App\Filament\Coordinador\Resources\JuegoClashRoyaleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJuegoClashRoyale extends EditRecord
{
    protected static string $resource = JuegoClashRoyaleResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }*/
}
