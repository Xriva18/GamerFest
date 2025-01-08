<?php

namespace App\Filament\Resources\AuspiciantesResource\Pages;

use App\Filament\Resources\AuspiciantesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuspiciantes extends EditRecord
{
    protected static string $resource = AuspiciantesResource::class;

    protected function afterSave(): void
    {
        // Redirige a la lista después de guardar
        $this->redirect($this->getResource()::getUrl('index'));
    }
}
