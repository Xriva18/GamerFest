<?php

namespace App\Filament\Coordinador\Resources\JuegoJustDanceResource\Pages;

use App\Filament\Coordinador\Resources\JuegoJustDanceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJuegoJustDance extends EditRecord
{
    protected static string $resource = JuegoJustDanceResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }*/
}
