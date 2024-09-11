<x-filament-panels::page>
    <div class="max-w-lg mx-auto py-10">
        {{-- Card Layout --}}
        <x-filament::card>
            {{-- Title --}}
            <h2 class="text-2xl font-bold mb-4">استيراد بيانات الطلاب</h2>

            {{-- Description --}}
            <p class="text-gray-600 mb-6">
                قم بتحميل ملف Excel يحتوي على بيانات الطلاب التي ترغب في استيرادها.
            </p>

            {{-- Form --}}
            <form wire:submit.prevent="submit" enctype="multipart/form-data">
                {{-- File Upload --}}
                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700">
                        تحميل ملف Excel
                    </label>
                    <input type="file" id="file" wire:model="file"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        accept=".xlsx, .xls" />
                </div>

                {{-- Error Handling for File --}}
                @error('file')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

                {{-- Submit Button --}}
                <div class="mt-6">
                    <x-filament::button type="submit" color="primary" size="lg" class="w-full">
                        استيراد البيانات
                    </x-filament::button>
                </div>
            </form>

            {{-- Success Message --}}
            @if (session()->has('success'))
                <div class="mt-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif
        </x-filament::card>
    </div>
</x-filament-panels::page>
