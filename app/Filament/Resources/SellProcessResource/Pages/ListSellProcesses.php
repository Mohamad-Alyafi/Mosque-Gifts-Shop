<?php

namespace App\Filament\Resources\SellProcessResource\Pages;

use App\Filament\Resources\SellProcessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ListSellProcesses extends ListRecords
{
    protected static string $resource = SellProcessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            ExportAction::make()
                ->label('تصدير إلى إكسل')
                ->exports([
                    ExcelExport::make()
                        ->fromTable()
                        ->withFilename('الطلاب-' . date('Y-m-d')),
                ]),
        ];
    }
}
