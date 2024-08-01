<?php

namespace App\Filament\Resources\BuildingResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Components\Hidden;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Vendors;

class ExpensesRelationManager extends RelationManager
{
    protected static string $relationship = 'expenses';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('building_id')->default( $this->getOwnerRecord()),
                // Select::make('expense_type_id')
                //     ->relationship('expenseType', 'name'),
                // Select::make('vendor_id')
                //     ->relationship('vendor', 'name'),
                Select::make('expense_type_id')
                    ->relationship('expenseType', 'name')
                    ->label('Expense Type')
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('vendor_id', null))
                    ->required(),
                Select::make('vendor_id')
                    ->label('Vendor')
                    ->options(function (callable $get) {
                        $expenseTypeId = $get('expense_type_id');

                        if (!$expenseTypeId) {
                            return Vendors::all()->pluck('name', 'id');
                        }

                        return Vendors::where('expenses_type', $expenseTypeId)->pluck('name', 'id');
                    })
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Expenses list')
            ->columns([
                Tables\Columns\TextColumn::make('building.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expenseType.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vendor.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
