<?php

namespace App\Filament\Resources\VendorsResource\Pages;

use App\Filament\Resources\VendorsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVendors extends ViewRecord
{
    protected static string $resource = VendorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
