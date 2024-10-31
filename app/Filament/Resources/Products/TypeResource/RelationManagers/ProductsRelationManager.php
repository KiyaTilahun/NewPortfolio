<?php

namespace App\Filament\Resources\Products\TypeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mokhosh\FilamentRating\Components\Rating;


use Illuminate\Support\Str;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('Tabs')
                ->tabs([
                    Tab::make('Product Information')->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->live(true)
                            ->maxLength(2048)->afterStateUpdated(function (Set $set, $state) {
                                $set('slug', Str::slug($state));
                            }),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(2048),
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




                    Tab::make('Image & Details')->schema([

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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->slideOver(),
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
