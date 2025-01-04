<?php

namespace App\Filament\Resources\GestionParticipanteResource\Pages;

use App\Filament\Coordinador\Resources\GestionParticipanteResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ManageGestionParticipantes extends ListRecords
{
    protected static string $resource = GestionParticipanteResource::class;
}
