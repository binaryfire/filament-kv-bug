<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Test;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder\Block;
use App\Filament\Resources\TestResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TestResource\RelationManagers;

class TestResource extends Resource
{
    protected static ?string $model = Test::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Builder')
                    ->collapsible()
                    ->schema([
                        Builder::make('options')
                            ->blocks([
                                Block::make('text')
                                    ->label('Text input')
                                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                                    ->schema([
                                        self::getFieldNameInput(),
                                        Checkbox::make('is_required'),
                                    ]),

                                Block::make('select')
                                    ->icon('heroicon-o-chevron-up-down')
                                    ->schema([
                                        self::getFieldNameInput(),
                                        KeyValue::make('options')
                                            ->addButtonLabel('Add option')
                                            ->keyLabel('Value')
                                            ->valueLabel('Label'),
                                        Checkbox::make('is_required'),
                                    ]),

                                Block::make('checkbox')
                                    ->icon('heroicon-o-check-circle')
                                    ->schema([
                                        self::getFieldNameInput(),
                                        Checkbox::make('is_required'),
                                    ]),

                                Block::make('file')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        self::getFieldNameInput(),
                                        Grid::make()
                                            ->schema([
                                                Checkbox::make('is_multiple'),
                                                Checkbox::make('is_required'),
                                            ]),
                                    ]),
                            ])
                            ->columnSpan(3)
                            ->createItemButtonLabel('Add form input')
                            ->disableLabel(),
                    ]),
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
            'index' => Pages\ListTests::route('/'),
            'create' => Pages\CreateTest::route('/create'),
            'edit' => Pages\EditTest::route('/{record}/edit'),
        ];
    }    

    protected static function getFieldNameInput(): Grid
    {
        return Grid::make()
            ->schema([
                TextInput::make('name')
                    ->lazy()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $label = Str::of($state)
                            ->kebab()
                            ->replace(['-', '_'], ' ')
                            ->ucfirst();

                        $set('label', $label);
                    })
                    ->required(),

                TextInput::make('label')
                    ->required(),
            ]);
    }

}
