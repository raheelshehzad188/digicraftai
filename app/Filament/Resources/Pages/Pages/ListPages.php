<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\PageResource;
use App\Support\SystemPages;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('ensureSystemPages')
                ->label('Create System Pages')
                ->icon('heroicon-o-sparkles')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading('Create System Pages')
                ->modalDescription('About, Contact, Services, Team, Projects, Blog, FAQ, Quote pages create hongi. Purane pages overwrite nahi honge. Banner Images Settings → Page Banners se set karein.')
                ->action(function (): void {
                    $pages = SystemPages::ensure();

                    Notification::make()
                        ->title('System pages ready ('.$pages->count().')')
                        ->success()
                        ->send();
                }),
            CreateAction::make(),
        ];
    }
}
