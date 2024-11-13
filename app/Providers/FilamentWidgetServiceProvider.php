<?php

namespace App\Providers;

use App\Filament\Resources\CoutResource\Widgets\TotalCounts;
use App\Filament\Widgets\BlogPostsChart;
use App\Filament\Widgets\StatsWidget;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentWidgetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        StatsWidget::class;
        BlogPostsChart::class;
    }

    /**
     * Bootstrap services.
     */

}
