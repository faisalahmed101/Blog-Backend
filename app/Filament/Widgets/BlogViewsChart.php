<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class BlogViewsChart extends ChartWidget
{
    protected static ?string $heading = 'Views';

    protected function getData(): array
    {
      
            $data = Trend::model(Post::class)
            ->between(
                start: now()->subDay(20),
                end: now(),
            )
            ->perDay()
            ->sum('views');
            return [
                'datasets' => [
                    [
                        'label' => 'Views',
                        'data' => $data->map(fn (TrendValue $value) => (int) round($value->aggregate)),
                    ],
                ],
                'labels' =>   $data->map(fn ($trend) => Carbon::parse($trend->date)->format('j'))->toArray(),
                
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
