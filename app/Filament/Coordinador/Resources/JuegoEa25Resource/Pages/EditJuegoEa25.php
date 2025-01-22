<?php

namespace App\Filament\Coordinador\Resources\JuegoEa25Resource\Pages;

use App\Filament\Coordinador\Resources\JuegoEa25Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJuegoEa25 extends EditRecord
{
    protected static string $resource = JuegoEa25Resource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }*/
}
