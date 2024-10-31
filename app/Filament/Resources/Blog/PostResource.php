<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\PostResource\Pages;
use App\Filament\Resources\Blog\PostResource\RelationManagers;
use App\Models\Blog\Post;
use Carbon\Carbon;
use Closure;

use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $recordTitleAttribute = 'title';
    public static $colors = ['primary', 'secondary'];
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->live(true)
                        ->maxLength(2048)->afterStateUpdated(function (Set $set, $state) {
                            $set('slug', Str::slug($state));
                        }),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(2048),
                    // Forms\Components\RichEditor::make('body')
                    //     ->required()
                    //     ->columnSpanFull(),
                    TiptapEditor::make('body')->columnSpanFull()->extraInputAttributes(['style' => 'min-height: 12rem;'])->directory('images/thumbnail'),
                    Forms\Components\Toggle::make('is_featured')
                        ->required()->columnSpan(1),
                    Forms\Components\Toggle::make('is_published')
                        ->required()->columnSpan(1)->default(true)->live(),
                    Forms\Components\DateTimePicker::make('published_at')
                        ->hidden(function (Get $get, Set $set) {
                            $set('published_at', null);
                            return $get('is_published');
                        })->native(false)->columnSpanFull(),
                    Forms\Components\TextInput::make('meta_title')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('meta_description')
                        ->maxLength(255),
                ])->columnSpan(8)->columns(2),

                Section::make([

                    Forms\Components\FileUpload::make('thumbnail')->imageEditor()->directory('images/thumbnail'),
                    Forms\Components\TextInput::make('author')
                        ->maxLength(2048),
                    Forms\Components\Select::make('categories')
                        ->multiple()->preload()
                        ->relationship('categories', 'title'),
                ])->columnSpan(4)
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')->defaultImageUrl(url('/assets/placeholder.svg'))->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()->words(5, ' ...'),
                TextColumn::make('categories.title')
                    ->badge()
                    ->separator(',')->default('none'),
                ColumnGroup::make('Visibility', [
                    Tables\Columns\IconColumn::make('is_featured')->boolean()
                        ->label("Featured"),

                    Tables\Columns\ToggleColumn::make('is_published')->onColor(function ($record, $column) {
                        $name = $column->getName();
                        return $record->$name ? 'success' : 'danger';
                    })->label("Published"),
                ]),
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
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('from')->native(false),
                        DatePicker::make('until')->native(false),
                    ])
                    // ...
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['from'] ?? null) {
                            $indicators['from'] = 'Created from ' . Carbon::parse($data['from'])->toFormattedDateString();
                        }

                        if ($data['until'] ?? null) {
                            $indicators['until'] = 'Created until ' . Carbon::parse($data['until'])->toFormattedDateString();
                        }

                        return $indicators;
                    })
            ])
            ->actions([

            Action::make('share')->icon('heroicon-o-share')
                    ->url(fn (Post $record): string => route('demoshare',['post'=>$record->id]))->openUrlInNewTab() ->iconButton(),
                ActionGroup::make([
                    
                Action::make('feature')
                ->action(function (Post $record) {
                    $record->is_featured = true;
                    $record->save();
                })->icon('heroicon-o-check-badge')->color('success')
                ->hidden(fn(Post $record): bool => $record->is_featured),
            Action::make('unfeature')
                ->action(function (Post $record) {
                    $record->is_featured = false;
                    $record->save();
                })->icon('heroicon-o-minus-circle')->color('danger')
                ->visible(fn(Post $record): bool => $record->is_featured),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
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
