<?php

namespace App\Filament\Resources\Navigation\MenuitemResource\Pages;

use App\Filament\Resources\Navigation\MenuitemResource;
use Filament\Actions;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\EditRecord;
use Guava\FilamentIconPicker\Forms\IconPicker;

class EditMenuitem extends EditRecord
{
    protected static string $resource = MenuitemResource::class;

    protected  ?string $heading = 'Edit Menu Item';


    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    // function form(Form $form): Form
    // {
    //     return $form->schema(
    //         [


    //             Section::make('Main Menu ')->schema([
    //                 Select::make('menu_id')->relationship('menu', 'name')
    //                     ->required()
    //                     ->searchable()
    //                     ->preload()->label('Available Menus')->columnSpan(3),
    //                 TextInput::make('name')
    //                     ->required()
    //                     ->maxLength(255)->columnSpan(3),
    //                 TextInput::make('url')
    //                     ->maxLength(255)->columnSpan(2),
    //                 // if the menu has icon
                    
    //                 TextInput::make('icon')
    //                 ->maxLength(255)->columnSpan(2),
    //                 Checkbox::make('visibility')->inline(false)->default(true)->columnSpan(2)
    //             ])->columns(6)->collapsible(),


    //             // Section::make('Setting Section')->schema([
    //             //     Section::make([Toggle::make('hasSetting')->live()])->columnSpan(1),
    //             //     KeyValue::make('settings')
    //             //         ->hidden(fn(Get $get): bool => $get('hasSetting') != true)->live()
    //             //         ->default([])->columnSpan(1),
    //             // ])->columns(2),
    //             Section::make('Sub Menus Section')->schema([Section::make([
    //                 Toggle::make('hasSubmenu')->live(),
    //                 Repeater::make('submenus')->schema([
    //                     Section::make([
    //                         TextInput::make('title')->required()->columnSpan(2),
    //                         TextInput::make('url')
    //                         ->maxLength(255)
    //                         ->columnSpan(1)
    //                         ->label('URL/ROUTE'),
    //                 Checkbox::make('visibility')->inline(false)->default(true)->columnSpan(1),

    //                     ])->columns(2),
    //                     Toggle::make('hasSecondSubmenu')->live()->default(false)->hidden(fn(Get $get): bool => $get('hasSecondSubmenu') == false),
    //                     Repeater::make('secondsubmenus')->schema([
    //                         Section::make([
    //                             TextInput::make('title')->required()->columnSpan(2),
    //                             TextInput::make('url')
    //                             ->maxLength(255)
    //                             ->columnSpan(1)
    //                             ->label('URL/ROUTE'),
    //                     Checkbox::make('visibility')->inline(false)->default(true)->columnSpan(1),

    //                         ])->columns(2),

    //                     ])->visible(fn(Get $get): bool =>  $get('hasSecondSubmenu'))->dehydrated(fn(Get $get): bool =>  $get('hasSecondSubmenu')),
    //                 ])->visible(fn(Get $get): bool =>  $get('hasSubmenu'))->collapsible(),
    //             ]),])



    //         ]
    //     );
    // }
}
