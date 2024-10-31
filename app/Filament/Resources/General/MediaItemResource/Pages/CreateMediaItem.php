<?php

namespace App\Filament\Resources\General\MediaItemResource\Pages;

use App\Filament\Resources\General\MediaCategoryResource;
use App\Filament\Resources\General\MediaItemResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\URL;
use Livewire\Attributes\On;

class CreateMediaItem extends CreateRecord 
{
    protected static string $resource = MediaItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('createCategory')
            ->label('Create New Category')->url(MediaCategoryResource::getUrl('create'))->modal()
            ->icon('heroicon-o-plus')

            // Action::make('createCategory')
            //         ->label('Create New Category')
            //         ->action(function () {
            //             return URL::route('filament.resources.media-categories.create');
            //         })
            //         ->modal()
            //         ->icon('heroicon-o-plus'),

           
        ];
    }

    // #[On('type_updated')]
    // public function useRecord($type)
    // {
    //     dd($type);
    // }

    #[On('type_updated')]
    public function userFormUpdated(): void
    {
        // dd("hello");
        
    }
}
