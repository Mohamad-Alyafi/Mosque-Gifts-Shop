<?php

namespace App\Filament\Pages;

use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use Filament\Pages\Page;

class ExcelImport extends Page
{
    use WithFileUploads;

    public $file; // Declare the file property, but don't type it.

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';
    protected static string $view = 'filament.pages.excel-import';
    protected static ?int $navigationSort = 10;
    protected static ?string $navigationLabel = 'استيراد الطلاب';
    protected static ?string $title = 'استيراد الطلاب';

    public static function canAccess(): bool
    {
        return auth()->user()->email == "nihadalyafi@gmail.com";
    }

    public function submit()
    {
        // Validate file type
        $this->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        // Import the file
        Excel::import(new StudentsImport, $this->file->getRealPath());

        // Reset file after successful import
        $this->file = null;

        // Provide success feedback
        session()->flash('success', 'Students imported successfully.');
    }

    // public function render()
    // {
    //     return view('filament.pages.excel-import');
    // }
}
