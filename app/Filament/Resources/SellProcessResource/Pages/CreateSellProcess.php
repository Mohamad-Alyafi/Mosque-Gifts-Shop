<?php

namespace App\Filament\Resources\SellProcessResource\Pages;

use App\Filament\Resources\SellProcessResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSellProcess extends CreateRecord
{
    protected static string $resource = SellProcessResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
