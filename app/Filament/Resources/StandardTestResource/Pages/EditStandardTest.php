<?php

namespace App\Filament\Resources\StandardTestResource\Pages;

use App\Filament\Resources\StandardTestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStandardTest extends EditRecord
{
    protected static string $resource = StandardTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
