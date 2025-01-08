<?php

namespace App\Filament\Resources\AuspiciantesResource\Pages;

use App\Filament\Resources\AuspiciantesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAuspiciantes extends CreateRecord
{
    protected static string $resource = AuspiciantesResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirigir a la lista de juegos después de crear un registro
        return $this->getResource()::getUrl('index');
    }
}
