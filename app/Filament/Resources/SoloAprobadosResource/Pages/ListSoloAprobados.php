<?php

namespace App\Filament\Resources\SoloAprobadosResource\Pages;

use App\Filament\Resources\SoloAprobadosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoloAprobados extends ListRecords
{
    protected static string $resource = SoloAprobadosResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }*/
}
