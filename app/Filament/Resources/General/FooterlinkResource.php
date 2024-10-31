<?php

namespace App\Filament\Resources\General;

use App\Filament\Resources\General\FooterlinkResource\Pages;
use App\Filament\Resources\General\FooterlinkResource\RelationManagers;
use App\Models\General\Footerlink;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use RalphJSmit\Filament\SEO\SEO;

class FooterlinkResource extends Resource
{
    protected static ?string $model = Footerlink::class;

    protected static ?string $navigationIcon = 'heroicon-s-bars-2';
    protected static ?string $navigationLabel = 'Footers and Logo';
    protected static ?string $navigationGroup = 'Navigations';
    protected static ?string $label = 'Footer';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Footer Links and Logos')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()->unique(ignoreRecord: true)->afterStateUpdated(function ($state, callable $set) {
                                        $set('name',  strtoupper(str_replace(' ', '_', $state)));
                                    })
                                    ->maxLength(255)->columnSpan(1),
                                Toggle::make('is_visible')
                                    ->label('Visibility')->columnSpan(1)
                                    ->default('true')->inline(false),

                                Section::make('Settings')
                                    ->schema([


                                        Toggle::make('data.has_title')
                                            ->label('Add Title')
                                            ->columnSpan(1)
                                            ->live(),
                                        Toggle::make('data.is_logo')
                                            ->label('Add Image ')
                                            ->columnSpan(1)
                                            ->live(),
                                        Toggle::make('data.has_description')
                                            ->label('Add Description')
                                            ->columnSpan(1)
                                            ->live(),
                                    ])
                                    ->columns(3),

                                Section::make('Setting Values')
                                    ->schema([

                                        TextInput::make('data.title')->disabled(fn(Get $get) => !$get('data.has_title'))->columnSpan(1),

                                        FileUpload::make('data.image')
                                            ->label('Icon')
                                            ->image()
                                            ->maxSize(10000)
                                            ->imageEditor()
                                            ->columnSpan(1)
                                            ->hidden(fn(Get $get) => !$get('data.is_logo'))->directory('images/footerlogos')->columnSpan(1),

                                        RichEditor::make('data.description')->disabled(fn(Get $get) => !$get('data.has_description'))->columnSpan(2),
                                        TextInput::make('url')->columnSpan(2)->helperText("this is not mandatory"),
                                    ])
                                    ->columns(2),

                            ])->columns(2),
                        Tabs\Tab::make('SEO')
                            ->schema([

                                // Toggle::make('data.has_seo')
                                //     ->label('Add SEO ')
                                //     ->columnSpan(1)
                                //     ->live(),
                                // SEO::make()->hidden(fn(Get $get) => !$get('data.has_seo')),

                                Fieldset::make('SEO')->schema([ Forms\Components\TextInput::make('data.meta_title')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('data.meta_description')
                                ->maxLength(255),])

                            ]),

                    ])->columnSpan(2)
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_visible')->boolean()->color(function ($record, $column) {
                    $name = $column->getName();
                    return $record->$name ? 'info' : 'danger';
                })->label("Visibility"),
                Tables\Columns\IconColumn::make('data.is_logo')
                    ->boolean()->label('Has Logos'),
                Tables\Columns\IconColumn::make('data.has_title')
                    ->boolean()->label('Has Titles'),
                Tables\Columns\IconColumn::make('data.has_description')
                    ->boolean()->label('Has Descriptions'),

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
                //
            ])
            ->actions([
                Action::make('Show Content')
                ->action(function (Footerlink $record) {
                    $record->is_visible = true;
                    $record->save();
                })
                ->hidden(fn(Footerlink $record): bool => $record->is_visible),
            Action::make('Hide Content')
                ->action(function (Footerlink $record) {
                    $record->is_visible = false;
                    $record->save();
                })
                ->visible(fn(Footerlink $record): bool => $record->is_visible),
            ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
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
            'index' => Pages\ListFooterlinks::route('/'),
            'create' => Pages\CreateFooterlink::route('/create'),
            'view' => Pages\ViewFooterlink::route('/{record}'),
            'edit' => Pages\EditFooterlink::route('/{record}/edit'),
        ];
    }
}
