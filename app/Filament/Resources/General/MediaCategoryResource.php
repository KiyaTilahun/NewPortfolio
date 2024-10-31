<?php

namespace App\Filament\Resources\General;

use App\Filament\Resources\General\MediaCategoryResource\Pages;
use App\Filament\Resources\General\MediaCategoryResource\RelationManagers;
use App\Filament\Resources\MediaCategoryResource\RelationManagers\MediaItemsRelationManager;
use App\Models\General\MediaCategory;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaCategoryResource extends Resource
{
    public static $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
    protected static ?string $model = MediaCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $breadcrumb = 'File Categories';
    protected static ?string $navigationLabel = 'Categories';
    protected static ?string $navigationGroup = 'File Manager';
    protected static ?string $label = 'All File Categories';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('parent_id')
                    ->label('Parent Category')
                    ->relationship('parent', 'name') // Assuming 'name' is the column used for category names
                    ->nullable()
                    ->helperText('Select a parent category (optional)'),
                TextInput::make('name')
                    ->label('Category Name')
                    ->required()
                    ->maxLength(255)
                    ->unique('media_categories', 'name')
                    ->helperText('The category name must be unique.'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->searchable()->badge()->color('warning'),
                    // ->color(function () {
                    //     // Access the static $colors property using self::
                    //     return self::$colors[array_rand(self::$colors)];
                    // }),
                    Tables\Columns\TextColumn::make('Parent Folder')
                    ->getStateUsing(function ($record) {
                        return $record->parent ? $record->parent->name : 'No Parent';
                    })
                    ->label('Parent Folder'),
                    Tables\Columns\TextColumn::make('No. of Child Categories')
                    ->getStateUsing(function ($record) {
                        return   MediaCategory::where('parent_id', $record->id)->count() ?? 0;
                    })
                    ->label('No. of Categories/Folder')
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('No. of Files')
                    ->getStateUsing(function ($record) {

                        return count($record->mediaItems) ? count($record->mediaItems) : 0;
                    })->label('No. of Files')->badge()->color('primary'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            MediaItemsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMediaCategories::route('/'),
            'create' => Pages\CreateMediaCategory::route('/create'),
            'edit' => Pages\EditMediaCategory::route('/{record}/edit'),
        ];
    }
}
