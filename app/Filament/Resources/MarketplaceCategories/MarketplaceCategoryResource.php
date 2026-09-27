<?php

namespace App\Filament\Resources\MarketplaceCategories;

use App\Filament\Resources\MarketplaceCategories\Pages\CreateMarketplaceCategory;
use App\Filament\Resources\MarketplaceCategories\Pages\EditMarketplaceCategory;
use App\Filament\Resources\MarketplaceCategories\Pages\ListMarketplaceCategories;
use App\Filament\Resources\MarketplaceCategories\Schemas\MarketplaceCategoryForm;
use App\Filament\Resources\MarketplaceCategories\Tables\MarketplaceCategoriesTable;
use App\Models\MarketplaceCategory;
use BackedEnum;
use App\Filament\Concerns\AuthorizesPanelRole;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MarketplaceCategoryResource extends Resource
{
    use AuthorizesPanelRole;

    protected static ?string $model = MarketplaceCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static string|UnitEnum|null $navigationGroup = 'Marketplace';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Categories';

    protected static ?string $modelLabel = 'Category';

    /**
     * @return list<string>
     */
    protected static function allowedRoles(): array
    {
        return ['market'];
    }

    public static function form(Schema $schema): Schema
    {
        return MarketplaceCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MarketplaceCategoriesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMarketplaceCategories::route('/'),
            'create' => CreateMarketplaceCategory::route('/create'),
            'edit' => EditMarketplaceCategory::route('/{record}/edit'),
        ];
    }
}
