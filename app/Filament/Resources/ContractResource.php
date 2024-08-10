<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContractResource\Pages;
use App\Filament\Resources\ContractResource\RelationManagers;
use App\Models\Contract;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;


class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tenant_id')
                    ->relationship('tenant', 'name')
                    ->required(),

                Select::make('unit_id')
                    ->relationship('unit', 'name')
                    ->required(),

                DatePicker::make('start_date')
                    ->native(false)
                    ->displayFormat('d.m.Y')
                    ->required(),

                DatePicker::make('end_date')
                    ->native(false)
                    ->displayFormat('d.m.Y')
                    ->required(),

                TextInput::make('monthly_rent')
                    ->numeric()
                    ->required(),

                TextInput::make('security_deposit')
                    ->numeric()
                    ->required(),

                Select::make('status')
                    ->options([
                        'Active' => 'Active',
                        'Terminated' => 'Terminated',
                        'Deactivate' => 'Deactivate',
                        'Pending' => 'Pending'
                    ])
                    ->default('Pending') // Default to 'Pending'
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tenant.name')->sortable(),

                Tables\Columns\TextColumn::make('unit.name')->sortable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d.m.Y'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d.m.Y'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('monthly_rent')->numeric(),

                Tables\Columns\TextColumn::make('security_deposit')->numeric(),

                Tables\Columns\TextColumn::make('status'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit' => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}
