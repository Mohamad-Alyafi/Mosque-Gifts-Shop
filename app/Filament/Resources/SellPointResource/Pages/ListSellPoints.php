<?php

namespace App\Filament\Resources\SellPointResource\Pages;

use App\Filament\Resources\SellPointResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSellPoints extends ListRecords
{
    protected static string $resource = SellPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
