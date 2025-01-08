<?php

namespace App\Filament\Resources\JuegoResource\Pages;

use App\Filament\Resources\JuegoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJuego extends EditRecord
{
    protected static string $resource = JuegoResource::class;

    protected function afterSave(): void
    {
        // Redirige a la lista después de guardar
        $this->redirect($this->getResource()::getUrl('index'));
    }
}
