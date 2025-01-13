<?php

namespace App\Filament\Participante\Resources\InscripciongrupalResource\Pages;

use App\Filament\Participante\Resources\InscripciongrupalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInscripciongrupals extends EditRecord
{
    protected static string $resource = InscripciongrupalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
