<?php

namespace App\Filament\Resources\General;

use App\Filament\Resources\General\MediaItemResource\Pages;
use App\Filament\Resources\General\MediaItemResource\RelationManagers;
use App\Models\General\MediaCategory;
use App\Models\General\MediaItem;
use App\Models\General\MediaType;
use App\Models\Navigation\Menuitem;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Attributes\On;
use Livewire\Component;

class MediaItemResource extends Resource
{
    protected static ?string $model = MediaItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $breadcrumb = 'All Files';
    protected static ?string $navigationLabel = 'Files';
    protected static ?string $navigationGroup = 'File Manager';
    protected static ?string $label = 'All File Items';
    protected static ?int $navigationSort = 2;

    protected static $mimeTypeMap = [
        'Image' => ['image/jpeg', 'image/png', 'image/gif'],
        'Video' => ['video/mp4', 'video/mkv', 'video/avi'],
        'Document' => ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
        'Audio' => ['audio/mpeg', 'audio/wav', 'audio/ogg'],
        'Mixed' => ['*'],
    ];
    protected static $type=[];
    public static function form(Form $form): Form
    {
        
        return $form
            ->schema([
                Select::make('media_type_id')
                    ->label('Media Type')->reactive()
                    ->options(fn() => MediaType::pluck('name', 'id'))->helperText('File/Folder Type')->required()->label('Folder'),
           
                FileUpload::make('file_path')
                    ->multiple()
                    ->reorderable()->maxSize( 1048576)
                    ->live()->helperText('Choose File Depending on the file type you choosed | multiple file allowed')
                    ,
                // Select::make('media_category_id')
                //     ->label('Media Category')
                //     ->options(fn() => MediaCategory::pluck('name', 'id'))
                //     ->nullable(),

                Select::make('media_category_id')
                ->label('Media Category')
                ->options(fn() => MediaCategory::all()->pipe(function ($categories) {
                    return self::formattedCategories($categories);
                }))
                ->nullable()
                ->helperText('Select a media category (optional)'),
        
                TextInput::make('file_label')
                    ->label('File Label')
                    ->nullable()->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->nullable()->helperText("Make the text as short as possible"),

            ]);
    }
    protected static function formattedCategories($categories, $parentId = null, $level = 0)
    {
        $output = [];
    
        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $output[$category->id] = str_repeat('../', $level) . ' ' . $category->name;
                $output += self::formattedCategories($categories, $category->id, $level + 1);
            }
        }
    
        return $output;
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //

                Tables\Columns\TextColumn::make('mediaType.name')
                    ->label('Media Type')->badge()
                    ->sortable()->searchable()->color(function ($state) {
                        $arr = [
                            'primary' => 'Document',
                            'secondary' => 'Audio',
                            'success' => 'Video',
                        ];

                        // Find the color key for the state
                        $colorKey = array_search($state, $arr);

                        return $colorKey; // Default color if no match
                    }),

                TextColumn::make('mediaCategory.name')
                    ->label('Media Category')
                    ->sortable(),


                Tables\Columns\TextColumn::make('file_label')
                    ->label('File Label')
                    ->sortable(),
            ])
            ->filters([
                //
                SelectFilter::make('mediaCategory')
                    ->relationship('mediaCategory', 'name'),
                    Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Action::make('download')->color('info')->icon('heroicon-o-folder-arrow-down')->url(fn(MediaItem $record) => route('download.file', $record))
                    ->openUrlInNewTab()                // Action::make('createCategory')
                //     ->label('Create New Category')
                //     ->action(function () {
                //         // Open the modal for creating a new media category
                //         return redirect()->route('filament.resources.media-categories.create');
                //     })
                //     ->icon('heroicon-o-plus')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
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
            'index' => Pages\ListMediaItems::route('/'),
            'create' => Pages\CreateMediaItem::route('/create'),
            'edit' => Pages\EditMediaItem::route('/{record}/edit'),
        ];
    }

    // #[On('type_updated')]
    // public function useRecord($type)
    // {
    //     dd("hello");
    //     dd($type);
    // }

}
