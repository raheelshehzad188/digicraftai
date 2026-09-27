<?php

namespace App\Filament\Resources\SoftwareItems\Pages;

use App\Filament\Resources\SoftwareItems\SoftwareItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSoftwareItems extends ListRecords
{
    protected static string $resource = SoftwareItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
