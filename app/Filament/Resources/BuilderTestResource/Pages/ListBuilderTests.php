<?php

namespace App\Filament\Resources\BuilderTestResource\Pages;

use App\Filament\Resources\BuilderTestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBuilderTests extends ListRecords
{
    protected static string $resource = BuilderTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
