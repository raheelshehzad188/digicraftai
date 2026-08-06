<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeSectionResource\Pages;
use App\Models\HomeSection;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomeSectionResource extends Resource
{
    protected static ?string $model = HomeSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationGroup = 'CMS';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('key')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->disabled(fn (string $operation): bool => $operation === 'edit'),
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('title')
                            ->maxLength(255),
                        TextInput::make('subtitle')
                            ->maxLength(255),
                        RichEditor::make('content')
                            ->columnSpanFull(),
                        TextInput::make('button_text')
                            ->maxLength(255),
                        TextInput::make('button_url')
                            ->maxLength(255),
                        FileUpload::make('image')
                            ->disk('public')
                            ->directory('home')
                            ->image(),
                        TextInput::make('extra.banner_title')
                            ->label('Page banner title')
                            ->helperText('Used on About page header when editing the about section')
                            ->maxLength(255),
                        TextInput::make('extra.years')
                            ->label('Years badge number')
                            ->maxLength(10),
                        TextInput::make('extra.years_label')
                            ->label('Years badge label')
                            ->maxLength(100),
                        Repeater::make('extra.features')
                            ->label('Feature boxes')
                            ->schema([
                                TextInput::make('icon')
                                    ->placeholder('fa-city')
                                    ->helperText('Font Awesome class e.g. fa-city, fa-school')
                                    ->required(),
                                TextInput::make('line1')->required(),
                                TextInput::make('line2'),
                            ])
                            ->columns(3)
                            ->collapsible()
                            ->columnSpanFull(),
                        Toggle::make('is_visible')
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
                TextColumn::make('key')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable()
                    ->limit(40),
                IconColumn::make('is_visible')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_visible'),
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
            'index' => Pages\ListHomeSections::route('/'),
            'create' => Pages\CreateHomeSection::route('/create'),
            'edit' => Pages\EditHomeSection::route('/{record}/edit'),
        ];
    }
}
