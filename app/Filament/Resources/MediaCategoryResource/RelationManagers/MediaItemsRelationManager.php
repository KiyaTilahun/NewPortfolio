<?php

namespace App\Filament\Resources\MediaCategoryResource\RelationManagers;

use App\Filament\Resources\General\MediaItemResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'mediaItems';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('file_label')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('file_label')
            ->columns([
                Tables\Columns\TextColumn::make('file_label'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('Import New File')
                ->label('Create New File')->url(MediaItemResource::getUrl('create'))->modal()
                ->icon('heroicon-o-clipboard-document-list')
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
