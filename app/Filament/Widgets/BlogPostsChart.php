<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Posts';

    protected function getData(): array
    {
        $data = Trend::model(Post::class)
        ->between(
            start: now()->subMonth(6),
            end: now(),
        )
        ->perMonth()
        ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => $data->map(fn (TrendValue $value) => (int) round($value->aggregate)),
                ],
            ],
            'labels' =>   $data->map(fn ($trend) => Carbon::parse($trend->date)->format('F'))->toArray(),
            
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
