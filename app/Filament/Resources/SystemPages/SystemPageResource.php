<?php

namespace App\Filament\Resources\SystemPages;

use App\Filament\Resources\SystemPages\Pages\EditSystemPage;
use App\Filament\Resources\SystemPages\Pages\ListSystemPages;
use App\Filament\Resources\SystemPages\Schemas\SystemPageForm;
use App\Filament\Resources\SystemPages\Tables\SystemPagesTable;
use App\Models\Page;
use App\Support\SystemPages;
use BackedEnum;
use App\Filament\Concerns\AuthorizesPanelRole;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class SystemPageResource extends Resource
{
    use AuthorizesPanelRole;

    protected static ?string $model = Page::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMagnifyingGlassCircle;

    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Page SEO';

    protected static ?string $modelLabel = 'System Page';

    protected static ?string $pluralModelLabel = 'Page SEO';

    protected static ?string $slug = 'page-seo';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where(function ($query) {
                $query->whereIn('slug', array_keys(SystemPages::definitions()))
                    ->orWhereIn('system_key', ['marketplace', 'filehippo']);
            });
    }

    public static function form(Schema $schema): Schema
    {
        return SystemPageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SystemPagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSystemPages::route('/'),
            'edit' => EditSystemPage::route('/{record}/edit'),
        ];
    }
}
