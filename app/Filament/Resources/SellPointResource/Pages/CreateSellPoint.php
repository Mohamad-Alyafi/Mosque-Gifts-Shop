<?php

namespace App\Filament\Resources\SellPointResource\Pages;

use App\Filament\Resources\SellPointResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSellPoint extends CreateRecord
{
    protected static string $resource = SellPointResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
