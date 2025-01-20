<?php

namespace App\Filament\Participante\Resources\InscripcionResource\Pages;

use App\Filament\Participante\Resources\InscripcionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditInscripcion extends EditRecord
{
    protected static string $resource = InscripcionResource::class;

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
