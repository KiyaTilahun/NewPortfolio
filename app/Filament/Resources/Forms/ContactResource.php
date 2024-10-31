<?php

namespace App\Filament\Resources\Forms;

use App\Filament\Resources\Forms\ContactResource\Pages;
use App\Filament\Resources\Forms\ContactResource\RelationManagers;
use App\Models\Forms\Contact;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;
    protected static ?string $navigationGroup = 'Forms';
    protected static ?string $navigationLabel = 'Messages';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            TextInput::make('first_name')
                ->label('First Name')
                ->required(),
            TextInput::make('last_name')
                ->label('Last Name')
                ->nullable(),
            TextInput::make('email')
                ->label('Email Address')
                ->required()
                ->email(),
            TextInput::make('phone_number')
                ->label('Phone Number')
                ->nullable(),
            TextInput::make('subject')
                ->label('Subject')
                ->nullable(),
            Textarea::make('message')
                ->label('Message')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            // TextColumn::make('first_name')
            //     ->label('First Name')
            //     ->sortable()->toggleable(isToggledHiddenByDefault: true),
            // TextColumn::make('last_name')
            //     ->label('Last Name')
            //     ->sortable()
            //     ->toggleable(isToggledHiddenByDefault: true), 
            TextColumn::make('fullname')->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('email')
                ->label('Email')
                ->sortable(),
            TextColumn::make('phone_number')
                ->label('Phone Number')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true), // Optional column
            TextColumn::make('subject')
                ->label('Subject')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true), // Optional column
            TextColumn::make('message')
                ->label('Message')
                ->formatStateUsing(fn ($state) => Str::limit($state, 50)) // Truncate message to 50 characters
                ->sortable(),
            TextColumn::make('created_at')
                ->label('Submitted on')
                ->sortable()
                ->since(),

            ])
            ->filters([
                //

            ])
            ->actions([
                Action::make('reply')->icon('heroicon-o-arrow-uturn-left')
                    ->url(fn (Contact $record): string => route('reply',['contact'=>$record->id]))->openUrlInNewTab() ->iconButton(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListContacts::route('/'),
            // 'create' => Pages\CreateContact::route('/create'),
            // 'view' => Pages\ViewContact::route('/{record}'),
            // 'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
