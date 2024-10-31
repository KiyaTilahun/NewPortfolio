<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\TypeResource\Pages;
use App\Filament\Resources\Products\TypeResource\RelationManagers;
use App\Filament\Resources\Products\TypeResource\RelationManagers\ProductsRelationManager;
use App\Models\Products\Type;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;


class TypeResource extends Resource
{
    protected static ?string $model = Type::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Pr. Types';
    protected static ?string $navigationGroup = 'Products';
    protected static ?string $label = 'Product Types';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(2048)
                    ->live(true)
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(2048),

                ColorPicker::make('bg_color')
                    ->label('Background Color')
                    ->default('#FFFFFF'),

                ColorPicker::make('text_color')
                    ->label('Text Color')
                    ->default('#000000'),
                Forms\Components\TextInput::make('meta_description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()->label('Name'),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
              
                    Tables\Columns\TextColumn::make('products')
                    ->getStateUsing(function( $record) {
                    
                        return count($record->products)?count($record->products):0 ;
                    })->label('Products per Type')->badge()->color('warning'),
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

            ProductsRelationManager::class
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTypes::route('/'),
            // 'create' => Pages\CreateType::route('/create'),
            // 'view' => Pages\ViewType::route('/{record}'),
            'edit' => Pages\EditType::route('/{record}/edit'),
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
