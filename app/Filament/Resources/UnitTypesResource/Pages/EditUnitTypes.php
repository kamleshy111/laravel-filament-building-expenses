<?php

namespace App\Filament\Resources\UnitTypesResource\Pages;

use App\Filament\Resources\UnitTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnitTypes extends EditRecord
{
    protected static string $resource = UnitTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
