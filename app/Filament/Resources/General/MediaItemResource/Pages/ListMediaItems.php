<?php

namespace App\Filament\Resources\General\MediaItemResource\Pages;

use App\Filament\Resources\General\MediaItemResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;


use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListMediaItems extends ListRecords
{
    protected static string $resource = MediaItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    function getTabs(): array
    {

        return [

            'all' => Tab::make(),
            'Image' => Tab::make()
            ->modifyQueryUsing(function (Builder $query) {
                $query->whereHas('mediaType', function (Builder $query) {
                    $query->where('name', 'Image');
                });
            }),
            'Document' => Tab::make()
            ->modifyQueryUsing(function (Builder $query) {
                $query->whereHas('mediaType', function (Builder $query) {
                    $query->where('name', 'Document');
                });
            }),

        'Audio' => Tab::make()
            ->modifyQueryUsing(function (Builder $query) {
                $query->whereHas('mediaType', function (Builder $query) {
                    $query->where('name', 'Audio');
                });
            }),

        'Video' => Tab::make()
            ->modifyQueryUsing(function (Builder $query) {
                $query->whereHas('mediaType', function (Builder $query) {
                    $query->where('name', 'Video');
                });
            }),

        ];
    }
}
