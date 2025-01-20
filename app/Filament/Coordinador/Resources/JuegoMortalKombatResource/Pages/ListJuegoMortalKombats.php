<?php

namespace App\Filament\Coordinador\Resources\JuegoMortalKombatResource\Pages;

use App\Filament\Coordinador\Resources\JuegoMortalKombatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJuegoMortalKombats extends ListRecords
{
    protected static string $resource = JuegoMortalKombatResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }*/
}
