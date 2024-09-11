<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\SellProcess;
use Filament\Widgets\ChartWidget;
use App\Models\Event; // Assuming the Event model is available

class CategorySails extends ChartWidget
{
    protected static ?string $heading = 'نسبة النقاط المستهلكة';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        // Fetch the event from the database
        $event = Event::first(); // Adjust the query to match your requirements

        if (!$event) {
            return [
                'labels' => [],
                'datasets' => [
                    [
                        'label' => 'نسبة النقاط المستهلكة',
                        'data' => [],
                        'backgroundColor' => [],
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 2,
                        'fill' => true,
                        'tension' => 0.4,
                    ],
                ],
            ];
        }

        // Extract event details
        $date = $event->event_date;
        $start_time = $event->start_time;
        $end_time = $event->end_time;

        // Initialize array to hold points spent in each 15-minute interval
        $points_spent = [];
        $intervals = [];

        // Calculate intervals
        $current_time = "{$date} {$start_time}";
        $end_datetime = "{$date} {$end_time}";

        while (strtotime($current_time) < strtotime($end_datetime)) {
            $interval_start = $current_time;
            $interval_end = date('H:i:s', strtotime($current_time) + 15 * 60); // Add 15 minutes

            $intervals[] = date('H:i', strtotime($interval_start)) . ' - ' . date('H:i', strtotime($interval_end));

            // Query SellProcess for the specific interval
            $points_spent[] = SellProcess::whereBetween('created_at', [$interval_start, $interval_end])
                ->sum('price');

            $current_time = $interval_end; // Move to the next interval
        }

        // Set total points for all students
        $total_points = Student::sum('total_points');

        // Calculate percentage of points spent in each interval
        $percentage_spent = array_map(function ($spent) use ($total_points) {
            return $total_points > 0 ? ($spent / $total_points) * 100 : 0;
        }, $points_spent);

        return [
            'labels' => $intervals, // The dynamic time intervals for the chart
            'datasets' => [
                [
                    'label' => 'نسبة النقاط المستهلكة',
                    'data' => $percentage_spent,
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                    ],
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
