<?php

namespace App\Filament\Widgets;

use App\Models\SellPoint;
use App\Models\Student;
use App\Models\Teacher;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class title extends BaseWidget
{
    protected static ?int $sort = 1;

    protected static bool $isLazy = true;

    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            // Stat::make('', 'مسجد الإمام الشافعي')
            Stat::make('', 'إدارة مبيعات سوق الهدايا')
                ->extraAttributes([
                    'style' => 'width: 313%; display:flex; justify-content: center',
                ])
        ];
    }
}
