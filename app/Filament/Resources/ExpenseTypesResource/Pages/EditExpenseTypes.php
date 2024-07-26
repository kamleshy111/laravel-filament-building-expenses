<?php

namespace App\Filament\Resources\ExpenseTypesResource\Pages;

use App\Filament\Resources\ExpenseTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExpenseTypes extends EditRecord
{
    protected static string $resource = ExpenseTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
