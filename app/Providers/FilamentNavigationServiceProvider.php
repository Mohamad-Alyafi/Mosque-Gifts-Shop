<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;

class FilamentNavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Filament::registerUserMenuItems([
            'add-event' => UserMenuItem::make()
                ->label('المخطط الزمني')
                ->url('/admin/event-form') // Use the correct URL slug for the page
                ->icon('heroicon-o-calendar'),
        ]);
    }
}
