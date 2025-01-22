<?php

namespace App\Filament\Participante\Resources\EquipointegranteResource\Pages;

use App\Models\EquipoIntegrante;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CreateEquipointegrante extends CreateRecord
{
    protected static string $resource = \App\Filament\Participante\Resources\EquipointegranteResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $liderId = Auth::id();
        if (!$liderId) {
            throw ValidationException::withMessages([
                'lider_id' => 'No se pudo identificar al usuario autenticado.',
            ]);
        }

        $nombreEquipo = $data['nombrequipo'] ?? null;
        $usuarioIds = $data['usuario_id'] ?? [];

        if (!$nombreEquipo || empty($usuarioIds)) {
            throw ValidationException::withMessages([
                'form' => 'Todos los campos son obligatorios.',
            ]);
        }

        foreach ($usuarioIds as $usuarioId) {
            EquipoIntegrante::create([
                'nombrequipo' => $nombreEquipo,
                'usuario_id' => (int) $usuarioId,
                'lider_id' => (int) $liderId,
            ]);
        }

        return EquipoIntegrante::where('nombrequipo', $nombreEquipo)
            ->where('lider_id', $liderId)
            ->first();
    }
}
