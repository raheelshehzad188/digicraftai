<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'CMS';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Page Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Select::make('template')
                            ->options([
                                'default' => 'Default',
                                'full-width' => 'Full Width',
                                'sidebar' => 'Sidebar',
                            ])
                            ->default('default')
                            ->required(),
                        TextInput::make('banner_title')
                            ->maxLength(255),
                        RichEditor::make('content')
                            ->columnSpanFull(),
                        Toggle::make('is_published')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
                Section::make('SEO')
                    ->schema([
                        TextInput::make('meta_title')
                            ->maxLength(255),
                        Textarea::make('meta_description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Sections')
                    ->schema([
                        Repeater::make('sections')
                            ->relationship('sections')
                            ->schema([
                                Select::make('type')
                                    ->options([
                                        'hero' => 'Hero',
                                        'about' => 'About',
                                        'content' => 'Content',
                                        'stats' => 'Stats',
                                    ])
                                    ->required(),
                                TextInput::make('title')
                                    ->maxLength(255),
                                RichEditor::make('content')
                                    ->columnSpanFull(),
                                FileUpload::make('image')
                                    ->disk('public')
                                    ->directory('pages')
                                    ->image(),
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->orderColumn('sort_order')
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('template')
                    ->badge(),
                IconColumn::make('is_published')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->filters([
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
