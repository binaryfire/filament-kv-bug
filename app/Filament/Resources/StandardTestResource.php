<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StandardTestResource\Pages;
use App\Filament\Resources\StandardTestResource\RelationManagers;
use App\Models\StandardTest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\KeyValue;

class StandardTestResource extends Resource
{
    protected static ?string $model = StandardTest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                KeyValue::make('options')
                    ->reorderable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListStandardTests::route('/'),
            'create' => Pages\CreateStandardTest::route('/create'),
            'edit' => Pages\EditStandardTest::route('/{record}/edit'),
        ];
    }    
}
