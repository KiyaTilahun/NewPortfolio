<?php

namespace App\Filament\Resources\Navigation;

use App\Filament\Resources\Navigation\MenuitemResource\Pages;
use App\Filament\Resources\Navigation\MenuitemResource\RelationManagers;
use App\Models\Navigation\Menuitem;
use App\Models\Setting;
use App\Models\Settingcategory;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action as ActionsAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Group;
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
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Webbingbrasil\FilamentCopyActions\Forms\Actions\CopyAction;

use function PHPUnit\Framework\isNull;

class MenuitemResource extends Resource
{
    protected static ?string $model = Menuitem::class;
    protected static ?string $breadcrumb = 'All Menus';
    protected static ?string $navigationLabel = 'Menu Items';
    protected static ?string $navigationGroup = 'Navigations';
    protected static ?string $label = 'All Menu Items';
    protected static ?int $navigationSort = 2;



    const ICONS = [
        'fontawesome-solid' => 'fontawesome-solid',
        'heroicons' => 'heroicons',
    ];

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static $currentSettingType = null;
    public  $choosedtype = null;
    public static array $settingarray = ["hello" => "yes"];


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // ->headerActions([
                //     ActionsAction::make('hello')->action(function ($state,Set $set) {
                //     $set('visibility',!($state['visibility']));
                //  })->label(fn($state)=>$state['visibility']?'Hide':'Show')->color(fn($state)=>$state['visibility']?'warning':'success'),
                //  ])
                Section::make()->schema([
                    Section::make('Main Menu ')->schema([
                        Select::make('menu_id')->relationship('menu', 'name')
                            ->required()
                            ->searchable()
                            ->preload()->label('Available Menus')->columnSpan(3),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)->columnSpan(3),
                        Forms\Components\TextInput::make('url')
                            ->maxLength(255)->columnSpan(2),
                        // if the menu has icon
                        TextInput::make('icon')
                            ->maxLength(255)->columnSpan(2),
                        Checkbox::make('visibility')->inline(false)->default(true)->columnSpan(2),
                    ])->columns(6)->collapsible()->collapsed(true),
                    Section::make('Sub Menus Section')->schema([
                        Section::make([
                            Forms\Components\Toggle::make('hasSubmenu')->live()->extraAttributes(['class' => '!text-right']),
                            Forms\Components\Repeater::make('submenus')->schema([

                                Section::make([
                                    Forms\Components\TextInput::make('title')->required()->columnSpan(2),
                                    TextInput::make('url')->maxLength(255)->label('URL/ROUTE')->columnSpan(1),
                                    Checkbox::make('visibility')->inline(false)->default(true)->columnSpan(1),
                                ])->columns(2),

                                Forms\Components\Toggle::make('hasSecondSubmenu')
                                    ->live()->reactive()
                                    ->default(false),

                                Forms\Components\Repeater::make('secondsubmenus')
                                    ->schema([

                                        TextInput::make('title')
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('url')
                                            ->maxLength(255)
                                            ->columnSpan(1)
                                            ->label('URL/ROUTE'),
                                        Checkbox::make('visibility')->inline(false)->default(true)->columnSpan(1),

                                    ])
                                    ->visible(fn(Get $get): bool => $get('hasSecondSubmenu'))

                            ])
                                ->visible(fn(Get $get): bool => $get('hasSubmenu'))->itemLabel(function ($state) {

                                    return $state['title'] ?? null;
                                })
                                ->collapsible()->collapsed(),
                        ]),
                    ])->collapsible()->collapsed(true)
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()->label('Menu Name')->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('menu.name')
                    ->numeric()
                    ->sortable()->label('Menu Type'),
                Tables\Columns\IconColumn::make('hasSubmenu')
                    ->boolean()->color('warning'),
            ])->defaultGroup('menu.name')
            // ->reorderable('order', true)->reorderRecordsTriggerAction(
            //     fn(Action $action, bool $isReordering) => $action
            //         ->button()
            //         ->label($isReordering ? 'Disable reordering' : 'Enable reordering'),
            // )
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('menu')
                    ->relationship('menu', 'name', fn(Builder $query) => $query->withTrashed())
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListMenuitems::route('/'),
            'create' => Pages\CreateMenuitem::route('/create'),
            'view' => Pages\ViewMenuitem::route('/{record}'),
            'edit' => Pages\EditMenuitem::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getSettings(): Collection
    {
        return Setting::all()->pluck('name', 'id');
    }

    // returning setting list

    public static function getSettingsList($id): Collection
    {
        $settings = Settingcategory::where('setting_id', $id)->get()->pluck('name', 'id');

        return $settings;
    }


    // returns setting type 

    public static function getSettingType($id): String
    {
        $type = Settingcategory::where('id', $id)->first();


        // dd(self::$choosedtype);
        return $type->type;
    }

    public static function SettingValues($type): String
    {
        $options = null;
        if ($type != null) {
            $options = Settingcategory::where('id', $type)->first();


            if ($options->type == 'Color') {
                return $options->color;
            } elseif ($options->type == 'Number') {
                return $options->value;
            } elseif ($options->type == 'Text') {
                return $options->value;
            } else {

                return $options->color;
            }
        } else {


            return '';
        }
    }

    public static function SettingOptions($type): array
    {

        $options = Settingcategory::where('id', $type)->pluck('option')->first();

        // Decode the JSON into an associative array


        // dd($options);
        return $options;
    }

    public static function adder($state): string
    {

        return '';
    }


    public static function addSettingKeyValue($name)
    {

        $key = Settingcategory::where('id', $name)->first();
        $newarray[$key->name] = '';
        self::$settingarray = array_merge(self::$settingarray, $newarray);

        // dd(self::$settingarray);

    }
}
