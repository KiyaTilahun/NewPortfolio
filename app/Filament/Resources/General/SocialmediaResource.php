<?php

namespace App\Filament\Resources\General;

use App\Filament\Resources\General\SocialmediaResource\Pages;
use App\Filament\Resources\General\SocialmediaResource\RelationManagers;
use App\Models\General\Socialmedia;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
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
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;

class SocialmediaResource extends Resource
{
    protected static ?string $model = Socialmedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationLabel = 'Social Media';
    protected static ?string $navigationGroup = 'Navigations';
    protected static ?string $label = 'Social Media Links';
    protected static ?int $navigationSort = 4;
    protected static ?string $recordTitleAttribute = 'name';


    const ICONS = [
        'fontawesome-solid' => 'fontawesome-solid',
        'fontawesome-brands' => 'fontawesome-brands',


    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Forms\Components\TextInput::make('name')
                        ->required()->unique(ignoreRecord: true)
                        ->maxLength(255)->afterStateUpdated(function ($state, callable $set) {
                            $set(
                                'name',
                                strtoupper(str_replace(' ', '_', $state)),
                            );
                        })->label('Section Name')->columnSpan(1),
                    Forms\Components\Select::make('pages')
                        ->multiple()->preload()
                        ->relationship('pages', 'name'),
                    Checkbox::make('is_visible')->default(true)->inline(false)->label('Visibility'),

                    Repeater::make('social')
                        ->schema([
                            TextInput::make('sociallink')->columnSpan(2)->label('Site Name')->required(),
                            TextInput::make('linkaddress')->columnSpan(1)->label('Site Url')->required()->default('#'),
                            Checkbox::make('visibility')->default(true)->inline(false),
                            Section::make([
                                Toggle::make('upload_image')
                                    ->label('Upload Image from File')
                                    ->columnSpan(1)->live(),

                                FileUpload::make('image')
                                    ->label('Icon')
                                    ->image()
                                    ->maxSize(2048)
                                    ->required()->imageEditor()
                                    ->columnSpan(1)
                                    ->hidden(fn(Get $get) => !$get('upload_image'))->directory('images/social-logos'),


                            ])->columns(2),
                            Section::make([
                                Toggle::make('use_url')->columnSpan(1)
                                    ->label('Use Url for Logos')
                                    ->columnSpan(1)->live()->dehydrated(),
                                TextInput::make('url')->hidden(fn(Get $get) => !$get('use_url'))->columnSpan(1),
                            ])->columns(2),

                            Section::make([
                                Toggle::make('use_svg')->columnSpan(1)
                                    ->label('Use Svg for Logos')
                                    ->columnSpan(1)->live()->dehydrated(),
                                Textarea::make('html_icon')->hidden(fn(Get $get) => !$get('use_svg'))->columnSpan(1),
                            ])->columns(2)

                        ])->reorderableWithButtons()->columnSpan(2)->columns(2)->collapsible(true)->label('Social Media Links')->addActionLabel('ADD LINK')->itemLabel(function ($state) {

                            return $state['sociallink'] ?? null;
                        })->collapsed(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('social')
                    ->getStateUsing(function ($record) {

                        return count($record->social);
                    })->label('Number of Links')->badge()->color('info'),
                Tables\Columns\IconColumn::make('is_visible')->boolean()->color(function ($record, $column) {
                    $name = $column->getName();
                    return $record->$name ? 'success' : 'danger';
                })->label("Visibility"),

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
                    ->action(function (Socialmedia $record) {
                        $record->is_visible = true;
                        $record->save();
                    })
                    ->hidden(fn(Socialmedia $record): bool => $record->is_visible),
                Action::make('Hide Content')
                    ->action(function (Socialmedia $record) {
                        $record->is_visible = false;
                        $record->save();
                    })
                    ->visible(fn(Socialmedia $record): bool => $record->is_visible),
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
            'index' => Pages\ListSocialmedia::route('/'),
            'create' => Pages\CreateSocialmedia::route('/create'),
            'view' => Pages\ViewSocialmedia::route('/{record}'),
            'edit' => Pages\EditSocialmedia::route('/{record}/edit'),
        ];
    }
}
