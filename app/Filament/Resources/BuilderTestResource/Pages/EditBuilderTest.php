<?php

namespace App\Filament\Resources\BuilderTestResource\Pages;

use App\Filament\Resources\BuilderTestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBuilderTest extends EditRecord
{
    protected static string $resource = BuilderTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
