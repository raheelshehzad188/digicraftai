<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageBannerResource\Pages;
use App\Models\PageBanner;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PageBannerResource extends Resource
{
    protected static ?string $model = PageBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'CMS';

    protected static ?string $navigationLabel = 'Page Banners';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Banner')
                    ->schema([
                        Select::make('page_key')
                            ->label('Page')
                            ->options([
                                'default' => 'Default (fallback)',
                                'home' => 'Home',
                                'about' => 'About',
                                'services' => 'Services',
                                'projects' => 'Projects',
                                'prices' => 'Pricing',
                                'team' => 'Team',
                                'testimonials' => 'Testimonials',
                                'blog' => 'Blog',
                                'contact' => 'Contact',
                                'service_detail' => 'Service Detail',
                                'project_detail' => 'Project Detail',
                                'team_detail' => 'Team Detail',
                                'blog_detail' => 'Blog Detail',
                                'cms_page' => 'CMS Pages (fallback)',
                            ])
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->searchable(),
                        TextInput::make('label')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Admin label only'),
                        TextInput::make('title')
                            ->label('Banner title override')
                            ->helperText('Optional. Leave blank to use the page\'s own title.')
                            ->maxLength(255),
                        FileUpload::make('background_image')
                            ->label('Banner background image')
                            ->disk('public')
                            ->directory('banners')
                            ->image()
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
                Section::make('SEO')
                    ->description('These fields are rendered in the page <head> on the frontend.')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255)
                            ->helperText('Browser tab / search title. Recommended under 60 characters.'),
                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->helperText('Recommended under 160 characters.')
                            ->columnSpanFull(),
                        TextInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->maxLength(255)
                            ->helperText('Comma-separated keywords')
                            ->columnSpanFull(),
                        TextInput::make('og_title')
                            ->label('OG Title')
                            ->maxLength(255)
                            ->helperText('Open Graph title for social shares. Falls back to Meta Title.'),
                        Textarea::make('og_description')
                            ->label('OG Description')
                            ->rows(2)
                            ->helperText('Open Graph description. Falls back to Meta Description.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsed(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')->searchable()->sortable(),
                TextColumn::make('page_key')->badge()->sortable(),
                TextColumn::make('meta_title')->label('SEO Title')->limit(30)->placeholder('—')->toggleable(),
                TextColumn::make('title')->label('Banner Title')->limit(30)->placeholder('—')->toggleable(),
                ImageColumn::make('background_image')->disk('public'),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageBanners::route('/'),
            'create' => Pages\CreatePageBanner::route('/create'),
            'edit' => Pages\EditPageBanner::route('/{record}/edit'),
        ];
    }
}
