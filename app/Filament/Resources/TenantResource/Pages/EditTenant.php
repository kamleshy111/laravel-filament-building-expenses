<?php

namespace App\Filament\Resources\TenantResource\Pages;

use App\Filament\Resources\TenantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTenant extends EditRecord
{
    protected static string $resource = TenantResource::class;


    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['type'] === 'Private') {
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
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
