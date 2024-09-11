<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SellProcessResource\Pages;
use App\Filament\Resources\SellProcessResource\RelationManagers;
use App\Models\SellProcess;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SellProcessResource extends Resource
{
    protected static ?string $model = SellProcess::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?int $navigationSort = 6;

    public static function getModelLabel(): string
    {
        return 'عملية البيع';
    }

    public static function getPluralModelLabel(): string
    {
        return 'عمليات البيع';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('teacher.name')
                    ->label('اسم الاستاذ البائع'),

                TextColumn::make('student.name')
                    ->label('اسم الطالب'),

                TextColumn::make('student.group')
                    ->label('اسم حلقة الطالب'),

                TextColumn::make('sell_point.name')
                    ->label('اسم نقطة البيع'),

                TextColumn::make('price')
                    ->label('المبلغ المدفوع')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSellProcesses::route('/'),
            // 'create' => Pages\CreateSellProcess::route('/create'),
            // 'edit' => Pages\EditSellProcess::route('/{record}/edit'),
        ];
    }
}
