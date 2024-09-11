<?php

namespace App\Filament\Widgets;

use App\Models\SellPoint;
use App\Models\Student;
use App\Models\Teacher;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class NumberOfWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected static bool $isLazy = true;

    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            Stat::make('الأساتذة', Teacher::count())->icon('heroicon-o-briefcase'),
            Stat::make('نقاط البيع', SellPoint::count())->icon('heroicon-o-building-storefront'),
            Stat::make('الطلاب', Student::count())->icon('heroicon-o-users'),

            // Stat::make('الأساتذة', 13)->icon('heroicon-o-briefcase'),
            // Stat::make('نقاط البيع', 5)->icon('heroicon-o-building-storefront'),
            // Stat::make('الطلاب', 617)->icon('heroicon-o-users'),

        ];
    }
}
