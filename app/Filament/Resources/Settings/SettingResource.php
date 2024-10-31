<?php

namespace App\Filament\Resources\Settings;

use App\Filament\Resources\Settings\SettingResource\Pages;
use App\Filament\Resources\Settings\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;


    protected static ?string $navigationLabel = 'All Settings';
    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $header = 'All Settings';
    protected static ?string $breadcrumb = 'All Settings';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        $settingtype = [
            'Boolean' => 'Boolean',
            'Number' => 'Number',
            'Text' => 'Text',
            'Color' => 'Color'
        ];
        return $form
            ->schema([
                //
                Select::make('settingcategory_id')
                    ->relationship('settingcategory', 'name')
                    ->required()
                    ->searchable()
                    ->preload()->label('Category'),
                Forms\Components\TextInput::make('name')
                    ->required()->live(onBlur: 50)
                    ->maxLength(255)->label('Setting name')->afterStateUpdated(function ($state, callable $set) {
                        $set('name', strtoupper(str_replace(' ', '_', $state)));
                    }),
                Select::make('type')
                    ->options($settingtype)
                    ->native(false)
                    ->reactive()->afterStateUpdated(fn(Set $set) => $set('value', null)),

                Section::make('Setting Values')
                    ->description('Add default values or options')
                    ->schema([
                        // KeyValue::make('option')
                        // ->keyLabel('Property name')->hidden(fn (Get $get): bool => $get('type') !== 'Options'),
                        ColorPicker::make('value')->hidden(fn(Get $get): bool => $get('type') !== 'Color')->dehydrated(fn(Get $get): bool => $get('type') == 'Color'),

                        TextInput::make('value')
                            ->hidden(fn(Get $get): bool => $get('type') !== 'Text')->dehydrated(fn(Get $get): bool => $get('type') == 'Text'), // Show when 'text' is selected
                        Toggle::make('value')
                            ->hidden(fn(Get $get): bool => $get('type') !== 'Boolean')->dehydrated(fn(Get $get): bool => $get('type') == 'Boolean')->default(true)->label('Boolean Value'), // Show when 'boolean' is selected
                        TextInput::make('value')->numeric()
                            ->hidden(fn(Get $get): bool => $get('type') !== 'Number')->dehydrated(fn(Get $get): bool => $get('type') == 'Number')->label('Number Value'),
                    ])->columnSpan(1)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('settingcategory.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')

                    ->sortable()->badge(),
                Tables\Columns\TextColumn::make('value'),
             
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
