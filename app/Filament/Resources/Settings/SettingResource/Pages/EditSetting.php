<?php

namespace App\Filament\Resources\Settings\SettingResource\Pages;

use App\Filament\Resources\Settings\SettingResource;
use Filament\Actions;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
    function form(Form $form): Form
    {
        $settingtype = [
            'Boolean' => 'Boolean',
            'Number' => 'Number',
            'Text' => 'Text',
            'Color' => 'Color'
        ];
        return $form->schema(
            [

                Select::make('settingcategory_id')
                ->relationship('settingcategory', 'name')
                ->required()
                ->searchable()
                ->preload()->label('Category'),
            TextInput::make('name')
                ->required()->live(onBlur:50)
                ->maxLength(255)->label('Setting name')->afterStateUpdated(function ($state, callable $set) {
                    $set('name', strtoupper(str_replace(' ', '_', $state)));
                }),
            Select::make('type')
                ->options($settingtype)
                ->native(false)
                ->reactive()->afterStateUpdated(fn(Set $set)=>$set('value',null)),
     
            TextInput::make('value')
            // Section::make('Setting Values')
            //     ->description('Add default values or options')
            //     ->schema([
            //         // KeyValue::make('option')
            //         // ->keyLabel('Property name')->hidden(fn (Get $get): bool => $get('type') !== 'Options'),
            //         ColorPicker::make('value')->hidden(fn(Get $get): bool => $get('type') !== 'Color')->dehydrated(fn(Get $get): bool => $get('type') == 'Color')->live(onBlur:50),

            //         TextInput::make('value')->live(onBlur:50)
            //             ->hidden(fn(Get $get): bool => $get('type') !== 'Text')->dehydrated(fn(Get $get): bool => $get('type') == 'Text'), // Show when 'text' is selected
            //         Toggle::make('value')->live(onBlur:50)
            //             ->hidden(fn(Get $get): bool => $get('type') !== 'Boolean')->dehydrated(fn(Get $get): bool => $get('type') == 'Boolean')->default(true)->label('Boolean Value'), // Show when 'boolean' is selected
            //         TextInput::make('value')->numeric()->live(onBlur:50)
            //             ->hidden(fn(Get $get): bool => $get('type') !== 'Number')->dehydrated(fn(Get $get): bool => $get('type') == 'Number')->label('Number Value'),
            //     ])->columnSpan(1),
                
            ]);
        }
}
