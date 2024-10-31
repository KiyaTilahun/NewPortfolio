<?php

namespace App\Filament\Resources\WebContents;

use App\Filament\Resources\WebContents\PageResource\Pages;
use App\Filament\Resources\WebContents\PageResource\RelationManagers;
use App\Models\WebContents\Page;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Web Contents';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                ->required()->live(onBlur:50)
                ->unique(ignoreRecord: true)
                ->label('Page Name')->afterStateUpdated(

                    function(Set $set,Get $get){

                    $set('name',strtolower(str_replace(' ', '_', $get('name'))));
                    $name=$get('name');
                     $set('url',null);
                     $set('route',null);
                     $set('route','pages.'.$name);
                     $set('url','api/pages/'.$name);

                  
                    }
                ),
                TextInput::make('url')
                ->required()
                ->unique(ignoreRecord: true)
                ->label('URL')->readOnly(),
                TextInput::make('route')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->label('ROUTE')->readOnly(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('index')
    ->rowIndex()->label(''),
                TextColumn::make('name')
                ->label('Page Name')
                ->sortable()
                ->searchable(),

            TextColumn::make('url')
                ->label('URL')
                ->sortable()
                ->searchable(isIndividual:true),

            TextColumn::make('route')
                ->label('Route')
                ->sortable()
                ->searchable(isIndividual:true),


            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
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
