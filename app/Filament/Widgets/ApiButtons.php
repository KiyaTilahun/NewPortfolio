<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\VisitorResource;
use App\Models\Products\Product;
use App\Models\Visitor;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ApiButtons extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static ?string $pollingInterval = '60s';
    protected function getStats(): array
    {

        $count = Visitor::sum('count');
        $daily = Visitor::where('date', Carbon::today())->first();


        return [
            //
            // Stat::make('Total Daily Visits',$daily->count??0)->color('success'),


            // Stat::make('Total Web Site Visits', $count ?? 0)->color('success'),
            Stat::make('Total Web Site Visits', $count ?? 0)
            ->color('success')
            ->url( VisitorResource::getUrl('index'))
            ,
            Stat::make('Total Products', count(Product::all()))->color('success'),
            Action::make('Check Out the api documentation')
                ->url(fn(): string => route('public_docs'))
                ->button()
                ->icon('heroicon-o-information-circle')->size('xxlg'),



        ];
    }
   
}
