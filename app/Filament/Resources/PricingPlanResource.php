<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PricingPlanResource\Pages;
use App\Models\PricingPlan;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PricingPlanResource extends Resource
{
    protected static ?string $model = PricingPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('tagline')
                            ->maxLength(255),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->default(0),
                        TextInput::make('period')
                            ->default('/ Mo')
                            ->maxLength(255),
                        TextInput::make('currency')
                            ->default('$')
                            ->maxLength(10),
                        TagsInput::make('features')
                            ->placeholder('Add a feature')
                            ->columnSpanFull(),
                        TextInput::make('button_text')
                            ->default('Order Now')
                            ->maxLength(255),
                        TextInput::make('button_url')
                            ->url()
                            ->maxLength(255),
                        Toggle::make('is_featured')
                            ->default(false),
                        Toggle::make('is_published')
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
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->formatStateUsing(fn ($state, PricingPlan $record): string => ($record->currency ?? '$').number_format((float) $state, 2))
                    ->sortable(),
                TextColumn::make('period'),
                IconColumn::make('is_featured')
                    ->boolean(),
                IconColumn::make('is_published')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_featured'),
                Tables\Filters\TernaryFilter::make('is_published'),
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
            'index' => Pages\ListPricingPlans::route('/'),
            'create' => Pages\CreatePricingPlan::route('/create'),
            'edit' => Pages\EditPricingPlan::route('/{record}/edit'),
        ];
    }
}
