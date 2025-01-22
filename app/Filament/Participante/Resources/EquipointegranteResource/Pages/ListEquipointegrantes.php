<?php

namespace App\Filament\Participante\Resources\EquipointegranteResource\Pages;

use App\Filament\Participante\Resources\EquipointegranteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEquipointegrantes extends ListRecords
{
    protected static string $resource = EquipointegranteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
