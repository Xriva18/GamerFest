<?php

namespace App\Filament\Coordinador\Resources\EnfrentamientoResource\Pages;

use App\Filament\Coordinador\Resources\EnfrentamientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnfrentamiento extends EditRecord
{
    protected static string $resource = EnfrentamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
