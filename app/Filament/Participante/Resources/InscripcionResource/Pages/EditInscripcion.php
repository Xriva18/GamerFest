<?php

namespace App\Filament\Participante\Resources\InscripcionResource\Pages;

use App\Filament\Participante\Resources\InscripcionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInscripcion extends EditRecord
{
    protected static string $resource = InscripcionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
