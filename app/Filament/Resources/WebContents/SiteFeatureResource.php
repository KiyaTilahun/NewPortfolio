<?php

namespace App\Filament\Resources\WebContents;

use App\Filament\Resources\WebContents\SiteFeatureResource\Pages;
use App\Filament\Resources\WebContents\SiteFeatureResource\RelationManagers;
use App\Models\WebContents\Page;
use App\Models\WebContents\SiteFeature;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Mokhosh\FilamentRating\Components\Rating;

use function Pest\Laravel\get;

class SiteFeatureResource extends Resource
{
    protected static ?string $model = SiteFeature::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket-square';
    protected static ?string $navigationGroup = 'Web Contents';
    protected static  $availablepages = [];
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Forms\Components\TextInput::make('name')
                        ->required()->unique(ignoreRecord: true)->afterStateUpdated(function ($state, callable $set) {
                            $set('name',  strtoupper(str_replace(' ', '_', $state)));
                        })
                        ->maxLength(255)->columnSpan(1),
                    Forms\Components\Select::make('pages')
                        ->multiple()->preload()->live()
                        ->relationship('pages', 'name'),
                    Toggle::make('is_visible')
                        ->label('Visibility')
                        ->columnSpan(1)->default('true')->inline(false),

                    Section::make('Title and Description')->description('This are optional')->schema([
                        TextInput::make('title')->columnSpan(1),
                        RichEditor::make('description')->columnSpan(1)
                    ])->columns(2)->collapsed(),
                    Section::make('Contents')->description('This are optional')->schema([
                        Repeater::make('data')
                            ->schema([
                                TextInput::make('title')->columnSpan(1)->label("Name"),
                                Checkbox::make('visibility')->default(true)->inline(false),
                                Forms\Components\Select::make('page_names')
                                    ->options(fn() => Page::all()->pluck('name', 'name'))
                                    ->label('Selected Pages')->multiple()->helperText("If no page is selected , by default it will be shown to every page of the first selection"),
                                FileUpload::make('image')
                                    ->image()
                                    ->maxSize(2048)
                                    ->imageEditor()
                                    ->columnSpan(1)
                                    ->directory('images/siteFeatures')->label('Image')->columnSpan(1),
                                TextInput::make('icon')->columnSpan(1),
                                TextInput::make('url')->columnSpan(1),
                                RichEditor::make('description')->extraInputAttributes(['style' => 'max-height: 200px; overflow: scroll'])->columnSpan(2),
                                Toggle::make('more')
                                    ->label('Has Rating and Subtitle')
                                    ->columnSpan(1)
                                    ->live()->dehydrated(false),
                                Fieldset::make('Label')
                                    ->schema([
                                        TextInput::make('subtitle')->columnSpan(1),
                                        Rating::make('rating')->columnSpan(1)->default(0),
                                    ])->hidden(fn(Get $get) => !$get('more'))


                            ])->columns(2)->collapsible()->itemLabel(function ($state) {

                                return $state['title'] ?? null;
                            })->collapsed(fn ($livewire) => $livewire instanceof Pages\ViewSiteFeature)
                    ])->collapsed(),

                    Fieldset::make('SEO')->schema([
                        Forms\Components\TextInput::make('meta_title')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('meta_description')
                            ->maxLength(255),
                    ])
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_visible')->boolean()->color(function ($record, $column) {
                    $name = $column->getName();
                    return $record->$name ? 'success' : 'danger';
                })->label("Visibility"),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([

                Action::make('Show Content')
                    ->action(function (SiteFeature $record) {
                        $record->is_visible = true;
                        $record->save();
                    })
                    ->hidden(fn(SiteFeature $record): bool => $record->is_visible),
                Action::make('Hide Content')
                    ->action(function (SiteFeature $record) {
                        $record->is_visible = false;
                        $record->save();
                    })
                    ->visible(fn(SiteFeature $record): bool => $record->is_visible),
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ])
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
            'index' => Pages\ListSiteFeatures::route('/'),
            'create' => Pages\CreateSiteFeature::route('/create'),
            'view' => Pages\ViewSiteFeature::route('/{record}'),
            'edit' => Pages\EditSiteFeature::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }


    // public static function getPageNames(array $selectedPageIds = [])
    // {
    //     // If no pages are selected, return an empty array
    //     if (empty($selectedPageIds)) {
    //         self::$availablepages= [];
    //     }

    //     // Fetch the names of the selected pages from the database
    //     // self::$availablepages=Page::whereIn('id', $selectedPageIds)
    //     //     ->pluck('name', 'name')
    //     //     ->toArray();

    //     self::$availablepages=$selectedPageIds ;
    //     // dd(self::$availablepages);


    //         // dd(self::$availablepages);

    //         // dd("hello");
    // }

}
