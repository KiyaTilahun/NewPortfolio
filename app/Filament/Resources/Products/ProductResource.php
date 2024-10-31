<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\ProductResource\Pages;
use App\Filament\Resources\Products\ProductResource\RelationManagers;
use App\Models\Products\Product;
use CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Mokhosh\FilamentRating\Components\Rating;
use Mokhosh\FilamentRating\Entries\RatingEntry;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Products';
    protected static ?string $navigationGroup = 'Products';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $label = 'Products';

    // public static function getGloballySearchableAttributes(): array
    // {
    //     return ['name'];
    // }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Product Information')->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->live(true)
                                ->maxLength(2048)->afterStateUpdated(function (Set $set, $state) {
                                    $set('slug', Str::slug($state));
                                }),
                                Forms\Components\Select::make('pages')
                                ->multiple()->preload()
                                ->relationship('pages', 'name'),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->maxLength(2048)->visible(false),
                            Forms\Components\Textarea::make('description')
                                ->columnSpan(1),
                            Forms\Components\Select::make('types')
                                ->multiple()->preload()
                                ->relationship('types', 'title')->columnSpan(1),

                            // Forms\Components\TextInput::make('rating')
                            //     ->maxLength(255),
                            Fieldset::make()
                                ->schema([
                                    Forms\Components\TextInput::make('price')
                                        ->numeric()
                                        ->prefix('ETB')->columnSpan(1),
                                    Rating::make('rating')->columnSpan(1),
                                    Forms\Components\Toggle::make('is_available')
                                        ->required()->default(true)->columnSpan(1),
                                    Forms\Components\Toggle::make('is_featured')
                                        ->required()->default(false)->columnSpan(1),
                                ])
                                ->columns(2)->columnSpan(2)
                        ])->columns(2),




                        Tabs\Tab::make('Image & Details')->schema([

                            Forms\Components\FileUpload::make('thumbnail')->image()->imageEditor()->directory('images/products/thumbnail'),

                            Forms\Components\KeyValue::make('details')->columnSpan(1),
                            Fieldset::make('More Images and SEO')
                                ->schema([

                                    // Repeater::make('gallery')
                                    //     ->schema([
                                        
                                    //     FileUpload::make('images')->image()->imageEditor()->directory('images/products/thumbnail'),
                                    //         // ...
                                    //     ])->addActionLabel("Add Product Image")->columnSpan(1),
                                    Forms\Components\FileUpload::make('gallery')->multiple()->image()->imageEditor()->directory('images/products/gallery'),
                                    Section::make('SEO')->schema([
                                        Forms\Components\TextInput::make('meta_title')
                                            ->maxLength(255)->columnSpan(1),
                                        Forms\Components\TextInput::make('meta_description')
                                            ->maxLength(255)->columnSpan(1),
                                    ])->columnSpan(1),
                                ])->columns(2),

                        ])->columns(2),
                    ]),




            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('types.title')
                    ->badge()
                    ->separator(',')->default('none')->label('Product Type'),
                // Tables\Columns\TextColumn::make('slug')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('price')
                //     ->money()
                //     ->sortable(),
                RatingColumn::make('rating')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_available')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)->trueColor('info'),

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
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
