<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\StudentResource\Pages;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 3;


    // public static function getNavigationGroup(): ?string
    // {
    //     return 'الطلاب';
    // }

    public static function getModelLabel(): string
    {
        return 'طالب';
    }

    public static function getPluralModelLabel(): string
    {
        return 'الطلاب';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('الاسم')
                    ->required(),

                TextInput::make('group')
                    ->label('الحلقة')
                    ->required(),

                TextInput::make('total_points')
                    ->label('مجموع النقاط')
                    ->numeric()
                    ->required(),

                TextInput::make('added_points')
                    ->label('النقاط المضافة من المشرف')
                    ->numeric()
                    ->required(),

                TextInput::make('barcode')
                    ->label('الباركود')
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
                    ->searchable(),

                TextColumn::make('group')
                    ->label('الحلقة')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('total_points')
                    ->alignCenter()
                    ->label('مجموع النقاط')
                    ->sortable()
                    ->numeric(),

                TextColumn::make('added_points')
                    ->alignCenter()
                    ->label('النقاط المضافة من المشرف')
                    ->sortable()
                    ->numeric(),

                TextColumn::make('current_points')
                    ->alignCenter()
                    ->label('النقاط المتبقية')
                    ->state(fn($record) => $record->current_points + $record->added_points)
                    ->sortable()
                    ->numeric(),

                TextColumn::make('barcode')
                    ->label('الباركود')
                    ->searchable(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
