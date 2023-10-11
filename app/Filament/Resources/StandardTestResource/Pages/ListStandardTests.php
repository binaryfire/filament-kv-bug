<?php

namespace App\Filament\Resources\StandardTestResource\Pages;

use App\Filament\Resources\StandardTestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStandardTests extends ListRecords
{
    protected static string $resource = StandardTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
