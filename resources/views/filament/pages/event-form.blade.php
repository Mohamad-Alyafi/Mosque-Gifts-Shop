<!-- resources/views/filament/pages/event-form.blade.php -->

<x-filament::page>
    <form wire:submit.prevent="submit" class="space-y-6">
        {{ $this->form }}

        <div class="mt-4">
            <x-filament::button type="submit">
                حفظ بيانات السوق
            </x-filament::button>
        </div>
    </form>
</x-filament::page>
