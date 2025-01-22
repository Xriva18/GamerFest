<?php

namespace App\Filament\Coordinador\Resources\EnfrentamientoResource\Pages;

use App\Filament\Coordinador\Resources\EnfrentamientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;

class ListEnfrentamientos extends ListRecords
{
    protected static string $resource = EnfrentamientoResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('generarAleatorio')
                ->label('Aleatorio')
                ->url(route('enfrentamientos.generar')) // Esta ruta debe estar definida en web.php
                ->color('primary'),
        ];
    }
}
