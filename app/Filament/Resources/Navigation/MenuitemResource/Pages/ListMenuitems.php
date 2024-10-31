<?php

namespace App\Filament\Resources\Navigation\MenuitemResource\Pages;

use App\Filament\Resources\Navigation\MenuitemResource;
use App\Models\Navigation\Menuitem;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;


class ListMenuitems extends ListRecords
{
    protected static string $resource = MenuitemResource::class;
   
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create New Menu Item')->color('info'),
        ];
    }

    function getTabs(): array
    {

        return [

            'all' => Tab::make()->badge(count(Menuitem::all())),
           

        ];
    }
}
