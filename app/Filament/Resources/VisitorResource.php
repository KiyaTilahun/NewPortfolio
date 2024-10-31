<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorResource\Pages;
use App\Filament\Resources\VisitorResource\RelationManagers;
use App\Models\Visitor;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('count')
                ->label('Visitor Daily Count')
                ->sortable()->badge()->color('success')
                ->searchable(),
        
            Tables\Columns\TextColumn::make('date')
                ->label('Date')
                ->sortable()
                ->date(),
                
            ])
            ->filters([
                //
                Filter::make('date')
    ->form([
        DatePicker::make('views_from')->native(false),
        DatePicker::make('views_until')->native(false),
    ])
    ->query(function (Builder $query, array $data): Builder {
        return $query
            ->when(
                $data['views_from'],
                fn (Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
            )
            ->when(
                $data['views_until'],
                fn (Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
            );
    })
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListVisitors::route('/'),
            // 'create' => Pages\CreateVisitor::route('/create'),
            // 'view' => Pages\ViewVisitor::route('/{record}'),
            // 'edit' => Pages\EditVisitor::route('/{record}/edit'),
        ];
    }

}
