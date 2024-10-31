<?php

namespace App\Filament\Resources\WebContents\SiteFeatureResource\Pages;

use App\Filament\Resources\WebContents\SiteFeatureResource;
use App\Models\WebContents\Page;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Mokhosh\FilamentRating\Components\Rating;

class EditSiteFeature extends EditRecord
{
    protected static string $resource = SiteFeatureResource::class;
    protected static  $availablepages=[];

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
    //     return     $form->schema([
    //         Section::make([
    //             Forms\Components\TextInput::make('name')
    //                 ->required()->unique(ignoreRecord: true)->afterStateUpdated(function ($state, callable $set) {
    //                     $set('name',  strtoupper(str_replace(' ', '_', $state)));
    //                 })
    //                 ->maxLength(255)->columnSpan(1),
    //         Forms\Components\Select::make('pages')
    //                 ->multiple()->preload()->live()
    //                 ->relationship('pages', 'name')->afterStateUpdated(function ($state, callable $set) {
    //                     // $state contains the selected page IDs
    //                     self::getPageNames($state); // Pass the selected page IDs to the method
    //                 }),
    //             Toggle::make('is_visible')
    //                 ->label('Visibility')
    //                 ->columnSpan(1)->default('true')->inline(false),

    //             Section::make('Title and Description')->description('This are optional')->schema([
    //                 TextInput::make('title')->columnSpan(1),
    //                 RichEditor::make('description')->columnSpan(1)
    //             ])->columns(2)->collapsible(true),
    //             Section::make('Contents')->description('This are optional')->schema([Repeater::make('data')
    //                 ->schema([
    //                     TextInput::make('title')->columnSpan(1),
    //                     Checkbox::make('visibility')->default(true)->inline(false),

    //                     Forms\Components\Select::make('selected_page_names')
    //                     ->options(fn()=>self::$availablepages)
    //                     ->label('Show Content For')
    //                     ->preload(),
    //                     FileUpload::make('image')
    //                         ->image()
    //                         ->maxSize(2048)
    //                         ->imageEditor()
    //                         ->columnSpan(1)
    //                         ->directory('images/siteFeatures')->label('Image')->columnSpan(1),
    //                     TextInput::make('icon')->columnSpan(1),
    //                     RichEditor::make('description')->extraInputAttributes(['style' => 'max-height: 200px; overflow: scroll'])->columnSpan(2),
    //                     Toggle::make('more')
    //                         ->label('Has Rating and Subtitle')
    //                         ->columnSpan(1)
    //                         ->live()->dehydrated(false),
    //                     Fieldset::make('Label')
    //                         ->schema([
    //                             TextInput::make('subtitle')->columnSpan(1),
    //                             Rating::make('rating')->columnSpan(1)->default(0),
    //                         ])->hidden(fn(Get $get) => !$get('more'))
    //                 ])->columns(2)->collapsible()])->collapsed(),
    //                 Fieldset::make('SEO')->schema([ Forms\Components\TextInput::make('meta_title')
    //                 ->maxLength(255),
    //             Forms\Components\TextInput::make('meta_description')
    //                 ->maxLength(255),])
    //         ])->columns(2)
    //     ]);
    // }

    // public static function getPageNames(array $selectedPageIds = [])
    // {
    //     // If no pages are selected, return an empty array
    //     if (empty($selectedPageIds)) {
    //         self::$availablepages= [];
    //     }
    
    //     // Fetch the names of the selected pages from the database
    //     self::$availablepages=Page::whereIn('id', $selectedPageIds)
    //         ->pluck('name', 'name')
    //         ->toArray();

    //         // dd("hello");
    // }
}
