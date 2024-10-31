<?php

namespace App\Filament\Resources\Navigation\MenuitemResource\Pages;

use App\Filament\Resources\Navigation\MenuitemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMenuitem extends CreateRecord
{
    protected static string $resource = MenuitemResource::class;
    protected  ?string $heading = 'Create New Menu Item';

}
