<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SellPointResource\Pages;
use App\Filament\Resources\SellPointResource\RelationManagers;
use App\Models\SellPoint;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SellPointResource extends Resource
{
    protected static ?string $model = SellPoint::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?int $navigationSort = 4;

    public static function getModelLabel(): string
    {
        return 'نقطة بيع';
    }

    public static function getPluralModelLabel(): string
    {
        return 'نقاط البيع';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('الاسم')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('الاسم')
                    ->sortable()
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSellPoints::route('/'),
            'create' => Pages\CreateSellPoint::route('/create'),
            'edit' => Pages\EditSellPoint::route('/{record}/edit'),
        ];
    }
}
