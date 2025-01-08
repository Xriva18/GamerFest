<?php

namespace App\Filament\Resources\JuegoResource\Pages;

use App\Filament\Resources\JuegoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJuego extends CreateRecord
{
    protected static string $resource = JuegoResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirigir a la lista de juegos después de crear un registro
        return $this->getResource()::getUrl('index');
    }
}
