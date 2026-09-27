<?php

namespace App\Filament\Resources\SoftwareItems;

use App\Filament\Concerns\AuthorizesPanelRole;
use App\Filament\Resources\SoftwareItems\Pages\CreateSoftwareItem;
use App\Filament\Resources\SoftwareItems\Pages\EditSoftwareItem;
use App\Filament\Resources\SoftwareItems\Pages\ListSoftwareItems;
use App\Filament\Resources\SoftwareItems\Schemas\SoftwareItemForm;
use App\Filament\Resources\SoftwareItems\Tables\SoftwareItemsTable;
use App\Models\SoftwareItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SoftwareItemResource extends Resource
{
    use AuthorizesPanelRole;

    protected static ?string $model = SoftwareItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCpuChip;

    protected static string|UnitEnum|null $navigationGroup = 'Software';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Software';

    protected static ?string $modelLabel = 'Software';

    /**
     * @return list<string>
     */
    protected static function allowedRoles(): array
    {
        return ['software'];
    }

    public static function form(Schema $schema): Schema
    {
        return SoftwareItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SoftwareItemsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSoftwareItems::route('/'),
            'create' => CreateSoftwareItem::route('/create'),
            'edit' => EditSoftwareItem::route('/{record}/edit'),
        ];
    }
}
