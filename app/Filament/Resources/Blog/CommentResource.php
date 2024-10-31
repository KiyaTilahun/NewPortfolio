<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\CommentResource\Pages;
use App\Filament\Resources\Blog\CommentResource\RelationManagers;
use App\Models\Blog\Comment;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    protected static ?string $navigationGroup = 'Blog';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('COMMENT')->schema([

                    Forms\Components\Select::make('post_id')
                        ->required()
                        ->relationship('post', 'title'),
                    Forms\Components\Textarea::make('content')
                        ->required()
                        ->columnSpanFull()->label('Comment'),


                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('post.title')
                    ->words(5, ' ...')
                    ->sortable()->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('content')
                    ->words(5, '---')
                    ->sortable()->searchable(isIndividual: true)->label('Comments'),
                Tables\Columns\TextColumn::make('created_at')->since()
                    ->sortable()
                    ->toggleable()->label('Posted At')->badge(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //


                Filter::make('created_at')
                    ->form([
                        Forms\Components\DateTimePicker::make('created_from')->native(false),
                        Forms\Components\DateTimePicker::make('created_until')->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([

                ActionGroup::make([
                    Tables\Actions\ViewAction::make()->slideOver(),
                    Tables\Actions\DeleteAction::make(),

                ]),



                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListComments::route('/'),
            // 'create' => Pages\CreateComment::route('/create'),
            // 'view' => Pages\ViewComment::route('/{record}'),
            // 'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }
    public static function canEdit(Model $record): bool
    {
        return false;
    }
   
    public static function canAccess(): bool
    {
        return false;
    }
}
