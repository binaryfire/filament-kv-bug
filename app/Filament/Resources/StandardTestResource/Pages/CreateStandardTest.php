<?php

namespace App\Filament\Resources\StandardTestResource\Pages;

use App\Filament\Resources\StandardTestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStandardTest extends CreateRecord
{
    protected static string $resource = StandardTestResource::class;
}
