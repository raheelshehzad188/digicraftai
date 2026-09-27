<?php

namespace App\Filament\Resources\SoftwareItems\Pages;

use App\Filament\Resources\SoftwareItems\SoftwareItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSoftwareItem extends EditRecord
{
    protected static string $resource = SoftwareItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
