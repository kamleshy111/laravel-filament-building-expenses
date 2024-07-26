<?php

namespace App\Filament\Resources\UnitTypesResource\Pages;

use App\Filament\Resources\UnitTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUnitTypes extends ViewRecord
{
    protected static string $resource = UnitTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
