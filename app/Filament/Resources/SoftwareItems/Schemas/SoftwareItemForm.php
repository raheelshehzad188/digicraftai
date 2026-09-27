<?php

namespace App\Filament\Resources\SoftwareItems\Schemas;

use App\Filament\Forms\SeoForm;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class SoftwareItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Software')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Content')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn ($state, callable $set, ?string $operation) => $operation === 'create' ? $set('slug', Str::slug((string) $state)) : null),
                                        TextInput::make('slug')->required()->unique(ignoreRecord: true),
                                        Select::make('categories')
                                            ->label('Categories')
                                            ->multiple()
                                            ->relationship('categories', 'name')
                                            ->preload()
                                            ->searchable()
                                            ->columnSpanFull(),
                                        TextInput::make('version')->placeholder('v128.0'),
                                        Select::make('license')
                                            ->options([
                                                'free' => 'Free',
                                                'freemium' => 'Freemium',
                                                'paid' => 'Paid',
                                            ])
                                            ->required()
                                            ->default('free'),
                                        Textarea::make('description')->rows(3)->columnSpanFull(),
                                        Repeater::make('overview')
                                            ->label('Overview paragraphs')
                                            ->simple(Textarea::make('paragraph')->rows(2))
                                            ->columnSpanFull(),
                                        Repeater::make('tags')
                                            ->simple(TextInput::make('tag'))
                                            ->columnSpanFull(),
                                        Repeater::make('platforms')
                                            ->simple(TextInput::make('platform')->placeholder('Windows'))
                                            ->columnSpanFull(),
                                        FileUpload::make('image')
                                            ->label('Logo / image')
                                            ->image()
                                            ->directory('software/logos')
                                            ->disk('public'),
                                        TextInput::make('icon')->placeholder('fab fa-chrome')->helperText('Font Awesome class'),
                                        TextInput::make('icon_text')->placeholder('Ps'),
                                        TextInput::make('icon_class')->placeholder('chrome')->helperText('Color class: chrome, vlc, ps, winrar, zoom, notepad'),
                                        Toggle::make('is_published')->default(true),
                                        TextInput::make('sort_order')->numeric()->default(0),
                                    ]),
                            ]),
                        Tab::make('Download')
                            ->schema([
                                Section::make('Download file / link')
                                    ->description('Upload a file or paste a link. The frontend Download button uses the uploaded file first, otherwise the link.')
                                    ->columns(2)
                                    ->schema([
                                        FileUpload::make('download_file')
                                            ->label('Upload software file')
                                            ->directory('software/files')
                                            ->disk('public')
                                            ->preserveFilenames()
                                            ->downloadable()
                                            ->openable()
                                            ->maxSize(204800)
                                            ->helperText('zip, exe, msi, dmg, apk, rar, 7z — max 200MB. This file is what the Download button serves.')
                                            ->columnSpanFull(),
                                        TextInput::make('download_url')
                                            ->label('Download link (URL)')
                                            ->url()
                                            ->placeholder('https://example.com/setup.exe')
                                            ->helperText('Used only if no file is uploaded above.')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                        Tab::make('Details')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('publisher'),
                                        TextInput::make('file_size')->placeholder('110 MB'),
                                        TextInput::make('release_date')->placeholder('Sep 3, 2024'),
                                        TextInput::make('os')->placeholder('Windows 11 / 10'),
                                        TextInput::make('language')->default('Multi-language'),
                                        TextInput::make('rating')->placeholder('4.8'),
                                        TextInput::make('votes')->placeholder('12,420'),
                                        TextInput::make('downloads')->placeholder('1.2M'),
                                        Toggle::make('show_mock_screenshots')->label('Show screenshot mockups'),
                                        Repeater::make('key_features')
                                            ->label('Key features')
                                            ->schema([
                                                TextInput::make('icon')->placeholder('fa-solid fa-bolt'),
                                                TextInput::make('title')->required(),
                                                Textarea::make('text')->rows(2),
                                            ])
                                            ->columns(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                        Tab::make('Versions & FAQ')
                            ->schema([
                                Repeater::make('versions')
                                    ->schema([
                                        TextInput::make('label')->placeholder('v128.0')->required(),
                                        Toggle::make('latest'),
                                        TextInput::make('date'),
                                        TextInput::make('size'),
                                        TextInput::make('downloads'),
                                        FileUpload::make('file')
                                            ->label('Version file')
                                            ->directory('software/files')
                                            ->disk('public')
                                            ->preserveFilenames()
                                            ->downloadable()
                                            ->maxSize(204800)
                                            ->columnSpanFull(),
                                        TextInput::make('url')
                                            ->label('Version download link')
                                            ->url()
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(5)
                                    ->columnSpanFull(),
                                Repeater::make('faqs')
                                    ->schema([
                                        TextInput::make('q')->label('Question')->required(),
                                        Textarea::make('a')->label('Answer')->rows(2),
                                    ])
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('SEO')
                            ->schema([
                                SeoForm::section()->collapsed(false),
                            ]),
                    ]),
            ]);
    }
}
