<?php

namespace App\Filament\Participante\Resources\InscripciongrupalResource\Pages;

use App\Filament\Participante\Resources\InscripciongrupalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditInscripciongrupals extends EditRecord
{
    protected static string $resource = InscripciongrupalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Añadir el usuario autenticado al formulario
        $data['usuario'] = Auth::user()->name . ' ' . Auth::user()->apellido;

        return $data;
    }
}
