<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Views', Post::sum('views'))
            ->description('Total post views'),

            Stat::make('Posts', Post::count())
            ->description('Total Posts'),

            Stat::make('Users', User::count())
            ->description('All registered users')
            ->descriptionIcon('heroicon-m-user-group', IconPosition::Before),

            Stat::make('Categories', Category::count())
            ->description('All categories'),
            
        ];
    }
}
