<?php

namespace App\Filament\Coordinador\Resources\JuegoMarioKartResource\Pages;

use App\Filament\Coordinador\Resources\JuegoMarioKartResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJuegoMarioKart extends EditRecord
{
    protected static string $resource = JuegoMarioKartResource::class;

    /*  protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }*/
}
