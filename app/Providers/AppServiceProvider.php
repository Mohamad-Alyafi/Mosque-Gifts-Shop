<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar']); // also accepts a closure
            // ->locales(['ar', 'en']); // also accepts a closure
        });

        TextInput::configureUsing(function (TextInput $input) {
            $input->translateLabel()
                ->label($input->getName());
        });
        TextColumn::configureUsing(function (TextColumn $input) {
            $input->translateLabel()
                ->label($input->getName());
        });
    }
}
