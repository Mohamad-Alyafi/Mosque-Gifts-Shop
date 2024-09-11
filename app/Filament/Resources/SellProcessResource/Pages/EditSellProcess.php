<?php

namespace App\Filament\Resources\SellProcessResource\Pages;

use App\Filament\Resources\SellProcessResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSellProcess extends EditRecord
{
    protected static string $resource = SellProcessResource::class;

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
