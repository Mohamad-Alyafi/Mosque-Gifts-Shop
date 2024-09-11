<?php

namespace App\Filament\Resources\TeacherResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Hash;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\TeacherResource;

class EditTeacher extends EditRecord
{
    protected static string $resource = TeacherResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Only hash the password if it is being updated
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $data;
    }

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
