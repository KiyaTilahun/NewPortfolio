<?php

namespace App\Filament\Resources\Settings;

use App\Filament\Resources\Settings\SettingcategoryResource\Pages;
use App\Filament\Resources\Settings\SettingcategoryResource\RelationManagers;
use App\Models\Settingcategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingcategoryResource extends Resource
{
    protected static ?string $model = Settingcategory::class;


    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $header= 'Setting Category';
    protected static ?string $breadcrumb= 'Setting Category';
    protected static ?string $modelLabel= 'Setting Category';

    protected static ?string $lable= 'Setting Category';

    
    protected static ?string $navigationLabel= 'New Category';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                ->required()->live(onBlur:50)
                ->maxLength(255)->columnSpan(2)->afterStateUpdated(function ($state, callable $set) {
                    $set('name', strtoupper(str_replace(' ', '_', $state)));
                }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSettingcategories::route('/'),
            'create' => Pages\CreateSettingcategory::route('/create'),
            'edit' => Pages\EditSettingcategory::route('/{record}/edit'),
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
