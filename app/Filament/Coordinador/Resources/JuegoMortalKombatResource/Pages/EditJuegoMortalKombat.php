<?php

namespace App\Filament\Coordinador\Resources\JuegoMortalKombatResource\Pages;

use App\Filament\Coordinador\Resources\JuegoMortalKombatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJuegoMortalKombat extends EditRecord
{
    protected static string $resource = JuegoMortalKombatResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }*/
}
