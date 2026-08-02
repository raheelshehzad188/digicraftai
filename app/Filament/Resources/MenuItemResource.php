<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Models\MenuItem;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    protected static ?string $navigationGroup = 'CMS';

    protected static ?string $navigationLabel = 'Menus';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('label')
                            ->required()
                            ->maxLength(255),
                        Select::make('type')
                            ->options([
                                'custom' => 'Custom URL',
                                'page' => 'Page',
                                'route' => 'Route',
                            ])
                            ->default('custom')
                            ->required()
                            ->live(),
                        TextInput::make('url')
                            ->maxLength(255)
                            ->visible(fn (Get $get): bool => $get('type') === 'custom'),
                        TextInput::make('route_name')
                            ->maxLength(255)
                            ->visible(fn (Get $get): bool => $get('type') === 'route'),
                        Select::make('page_id')
                            ->label('Page')
                            ->relationship('page', 'title')
                            ->searchable()
                            ->preload()
                            ->visible(fn (Get $get): bool => $get('type') === 'page'),
                        Select::make('parent_id')
                            ->label('Parent Menu Item')
                            ->relationship('parent', 'label')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Select::make('target')
                            ->options([
                                '_self' => 'Same Window',
                                '_blank' => 'New Window',
                            ])
                            ->default('_self')
                            ->required(),
                        Toggle::make('is_active')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->badge(),
                TextColumn::make('parent.label')
                    ->label('Parent')
                    ->placeholder('—'),
                TextColumn::make('page.title')
                    ->label('Page')
                    ->placeholder('—'),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
