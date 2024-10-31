<?php

namespace App\Filament\Widgets;

use App\Models\Blog\Post;
use App\Models\Products\Product;
use Filament\Actions\Action;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PostStats extends BaseWidget
{
    protected static ?int $sort=3;

    protected function getStats(): array
    {
        $totalViews = Post::sum('view_count');

        return [
            //
        //    Stat::make('Total Posts',count(Post::all()))->color('success'),
        //    Stat::make('Total Post Views',$totalViews)->color('success'),
        //    Stat::make('Total Products',count(Product::all()))->color('success'),
      
        ];
    }
}
