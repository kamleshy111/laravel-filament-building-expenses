<?php

namespace App\Filament\Resources\UnitsResource\Pages;

use App\Filament\Resources\UnitsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUnits extends ViewRecord
{
    protected static string $resource = UnitsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
