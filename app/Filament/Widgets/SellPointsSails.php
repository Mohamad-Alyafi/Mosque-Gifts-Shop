<?php

namespace App\Filament\Widgets;

use App\Models\SellPoint;
use App\Models\SellProcess;
use Filament\Widgets\ChartWidget;

class SellPointsSails extends ChartWidget
{
    protected static ?string $heading = 'مبيع نقاط البيع';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $sell_points = SellPoint::get();

        $data = [];
        foreach ($sell_points as $sell_point) {
            $data[$sell_point->name] = SellProcess::where('sell_point_id', $sell_point->id)->count();
        }

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'data' => array_values($data),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.5)',   // Red
                        'rgba(54, 162, 235, 0.5)',   // Blue
                        'rgba(255, 206, 86, 0.5)',   // Yellow
                        'rgba(75, 192, 192, 0.5)',   // Teal
                        'rgba(153, 102, 255, 0.5)',  // Purple
                        'rgba(255, 159, 64, 0.5)',   // Orange
                        'rgba(199, 199, 199, 0.5)',  // Light Gray
                        'rgba(83, 102, 255, 0.5)',   // Light Blue
                        'rgba(60, 179, 113, 0.5)',   // Medium Sea Green
                        'rgba(238, 130, 238, 0.5)',  // Violet
                        'rgba(75, 0, 130, 0.5)',     // Indigo
                        'rgba(255, 228, 181, 0.5)',  // Moccasin
                        'rgba(139, 69, 19, 0.5)',    // Saddle Brown
                        'rgba(255, 69, 0, 0.5)',     // Orange Red
                        'rgba(47, 79, 79, 0.5)',     // Dark Slate Gray
                        'rgba(95, 158, 160, 0.5)',   // Cadet Blue
                        'rgba(189, 183, 107, 0.5)',  // Dark Khaki
                        'rgba(219, 112, 147, 0.5)',  // Pale Violet Red
                        'rgba(106, 90, 205, 0.5)',   // Slate Blue
                        'rgba(127, 255, 0, 0.5)',    // Chartreuse
                        'rgba(255, 215, 0, 0.5)',    // Gold
                        'rgba(220, 20, 60, 0.5)',    // Crimson
                        'rgba(128, 0, 128, 0.5)',    // Purple
                        'rgba(245, 222, 179, 0.5)',  // Wheat
                        'rgba(210, 105, 30, 0.5)',   // Chocolate
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
