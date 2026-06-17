<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['name'] = $data['price'];
        $sellPointIds = $data['sell_point_id'] ?? [];

        // 1. Ensure it's treated as an array and filter out any empty values
        $sellPointIds = is_array($sellPointIds) ? array_filter($sellPointIds) : (array) $sellPointIds;

        // 2. If no sell points were selected, throw a fallback or handle it safely
        if (empty($sellPointIds)) {
            throw new \Exception('يجب اختيار نقطة بيع واحدة على الأقل.');
        }

        // 4. Safely pull the first item now that we know the array is not empty
        $data['sell_point_id'] = reset($sellPointIds);

        // 5. Clean up the virtual field
        unset($data['sell_points']);

        return $data;
    }
}
