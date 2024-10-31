<?php

namespace App\Filament\Resources\WebContents;

use App\Filament\Resources\WebContents\FaqResource\Pages;
use App\Filament\Resources\WebContents\FaqResource\RelationManagers;
use App\Models\WebContents\Faq;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Web Contents';
    protected static ?string $navigationLabel = 'FAQs';
    protected static ?string $label = "FAQs";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Frequently Asked Questions")->description("Fill out the form  to add a new frequently asked question.")->aside()->schema(

                    [
                        Forms\Components\TextInput::make('question')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('answer')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_active')
                            ->required()->default(true),
                            Forms\Components\Select::make('pages')
                            ->multiple()->preload()
                            ->relationship('pages', 'name'),
                    ]
                )
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->searchable()->label("QUESTIONS")->searchable(isIndividual:true)->words(6),
                    Tables\Columns\TextColumn::make('answer')
                    ->searchable()->label("ANSWERS")->searchable(isIndividual:true)->html()->words(5),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()->label("IS ACTIVE"),
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
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqs::route('/'),
            // 'create' => Pages\CreateFaq::route('/create'),
            // 'view' => Pages\ViewFaq::route('/{record}'),
            // 'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
