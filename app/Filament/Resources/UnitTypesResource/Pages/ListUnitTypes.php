<?php

namespace App\Filament\Resources\UnitTypesResource\Pages;

use App\Filament\Resources\UnitTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUnitTypes extends ListRecords
{
    protected static string $resource = UnitTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
