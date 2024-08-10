<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TenantResource\Pages;
use App\Filament\Resources\TenantResource\RelationManagers;
use App\Models\Tenants;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Get;

class TenantResource extends Resource
{
    protected static ?string $model = Tenants::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('type')
                    ->options([
                        'Private' => 'Private',
                        'Company' => 'Company',
                    ])
                    ->reactive() // Make the select field reactive to changes
                    ->default('Private'), // Default to 'Private'


                TextInput::make('first_name')
                    ->label('First Name')
                    ->maxLength(255)
                    ->required()
                    ->hidden(fn (Get  $get) => $get('type') === 'Company'), // Hide when 'Company' is selected

                TextInput::make('last_name')
                    ->label('Last Name')
                    ->maxLength(255)
                    ->required()
                    ->hidden(fn (Get  $get) => $get('type') === 'Company'),


                DatePicker::make('birthdate')
                    ->label('Birthdate')
                    ->native(false)
                    ->displayFormat('d.m.Y')
                    ->required()
                    ->hidden(fn (Get  $get) => $get('type') === 'Company'),

                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->hidden(fn (Get  $get) => $get('type') === 'Private'), // Hide when 'Private' is selected

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),


                TextInput::make('phone')
                    ->required()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('first_name')->sortable(),
                Tables\Columns\TextColumn::make('last_name')->sortable(),
                Tables\Columns\TextColumn::make('email')->sortable(),
                Tables\Columns\TextColumn::make('phone')->sortable(),
                Tables\Columns\TextColumn::make('type')->sortable(),
                Tables\Columns\TextColumn::make('birthdate')
                ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d.m.Y'))
                ->sortable(),
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
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
        ];
    }

}
