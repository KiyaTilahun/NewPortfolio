<?php

namespace App\Filament\Resources\Forms;

use App\Filament\Exports\Forms\SubscriberExporter;
use App\Filament\Resources\Forms\SubscriberResource\Pages;
use App\Filament\Resources\Forms\SubscriberResource\RelationManagers;
use App\Models\Forms\Subscriber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscriberResource extends Resource
{
    protected static ?string $model = Subscriber::class;
    protected static ?string $navigationGroup = 'Forms';
    protected static ?string $navigationLabel = 'Subscribtions';
    protected static ?string $navigationIcon = 'heroicon-o-at-symbol';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Checkbox::make('status')
                    ->required()->inline(false)->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')->onColor(function ($record, $column) {
                    $name = $column->getName();
                    return $record->$name ? 'success' : 'danger';
                }),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)->label("Subscribtion Date"),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Filter::make('status')
                    ->query(fn(Builder $query): Builder => $query->where('status', true))->label("Active Subscribtion")->toggle(),

            ])->headerActions([
                ExportAction::make()
                    ->exporter(SubscriberExporter::class)
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
                 ExportBulkAction::make()
                ->exporter(SubscriberExporter::class)
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
            'index' => Pages\ListSubscribers::route('/'),
            // 'create' => Pages\CreateSubscriber::route('/create'),
            // 'edit' => Pages\EditSubscriber::route('/{record}/edit'),
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
