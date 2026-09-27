<?php

namespace App\Filament\Resources\SoftwareCategories\Pages;

use App\Filament\Resources\SoftwareCategories\SoftwareCategoryResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListSoftwareCategories extends ListRecords
{
    protected static string $resource = SoftwareCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
