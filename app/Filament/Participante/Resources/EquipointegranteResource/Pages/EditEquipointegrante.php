<?php

namespace App\Filament\Participante\Resources\EquipointegranteResource\Pages;

use App\Filament\Participante\Resources\EquipointegranteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\EquipoIntegrante;
use Illuminate\Support\Facades\Auth;

class EditEquipointegrante extends EditRecord
{
    protected static string $resource = EquipointegranteResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $lider = Auth::user();

        $data['lider'] = $lider ? $lider->name . ' ' . $lider->apellido : 'Desconocido';

        $data['usuario_id'] = EquipoIntegrante::where('nombrequipo', $data['nombrequipo'])
            ->pluck('usuario_id')
            ->toArray();

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $nombreEquipo = $data['nombrequipo'];
        $liderId = Auth::id();
        $usuarioIds = $data['usuario_id'];

        // Validar que los nuevos datos de integrantes no estén vacíos
        if (empty($usuarioIds)) {
            throw new \Exception('Debe seleccionar al menos un integrante.');
        }

        // Eliminar los registros actuales del equipo
        EquipoIntegrante::where('nombrequipo', $nombreEquipo)->delete();

        // Insertar los nuevos integrantes
        foreach ($usuarioIds as $usuarioId) {
            EquipoIntegrante::create([
                'nombrequipo' => $nombreEquipo,
                'usuario_id' => $usuarioId,
                'lider_id' => $liderId,
            ]);
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
