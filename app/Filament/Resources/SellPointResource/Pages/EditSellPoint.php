<?php

namespace App\Filament\Resources\SellPointResource\Pages;

use App\Filament\Resources\SellPointResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSellPoint extends EditRecord
{
    protected static string $resource = SellPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
