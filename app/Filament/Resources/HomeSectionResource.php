<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeSectionResource\Pages;
use App\Models\HomeSection;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class HomeSectionResource extends Resource
{
    protected static ?string $model = HomeSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationGroup = 'CMS';

    protected static ?string $navigationLabel = 'Home Sections';

    protected static ?string $modelLabel = 'Home Section';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Section identity')
                    ->schema([
                        TextInput::make('key')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->disabled(fn (string $operation): bool => $operation === 'edit')
                            ->dehydrated(),
                        TextInput::make('name')
                            ->label('Admin label')
                            ->required()
                            ->maxLength(255),
                        Toggle::make('is_visible')
                            ->label('Show on home page')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),

                Placeholder::make('hero_help')
                    ->label('Hero / Carousel')
                    ->content(new HtmlString(
                        'This section only controls <strong>visibility</strong>. Edit slide text, buttons & images in <strong>CMS → Sliders</strong>.'
                    ))
                    ->visible(fn (Get $get): bool => $get('key') === 'hero'),

                Section::make('Fact counters')
                    ->schema([
                        Repeater::make('extra.facts')
                            ->label('Counters')
                            ->schema([
                                TextInput::make('value')->label('Number')->required()->maxLength(20),
                                TextInput::make('label')->label('Label text')->required()->maxLength(255),
                            ])
                            ->columns(2)
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('key') === 'facts'),

                Section::make('Headings & content')
                    ->schema([
                        TextInput::make('subtitle')
                            ->label('Eyebrow (small title)')
                            ->maxLength(255),
                        TextInput::make('title')
                            ->label('Main headline')
                            ->maxLength(255),
                        RichEditor::make('content')
                            ->label('Body content')
                            ->columnSpanFull()
                            ->visible(fn (Get $get): bool => in_array($get('key'), ['about', 'cta', 'quote_form'], true)),
                        TextInput::make('button_text')
                            ->maxLength(255)
                            ->visible(fn (Get $get): bool => in_array($get('key'), ['about', 'cta', 'quote_form'], true)),
                        TextInput::make('button_url')
                            ->maxLength(255)
                            ->visible(fn (Get $get): bool => in_array($get('key'), ['about', 'cta', 'quote_form'], true)),
                    ])
                    ->columns(2)
                    ->visible(fn (Get $get): bool => in_array($get('key'), [
                        'about', 'services_title', 'blog_title', 'contact',
                        'portfolio_title', 'pricing_title', 'team_title', 'testimonial_title', 'cta', 'quote_form',
                    ], true)),

                Section::make('About images')
                    ->schema([
                        FileUpload::make('image')
                            ->label('About image 1')
                            ->disk('public')
                            ->directory('home')
                            ->image(),
                        FileUpload::make('extra.image_2')
                            ->label('About image 2')
                            ->disk('public')
                            ->directory('home')
                            ->image(),
                        TextInput::make('extra.banner_title')
                            ->label('About page banner title')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->visible(fn (Get $get): bool => $get('key') === 'about'),

                Section::make('Services / Blog card labels')
                    ->schema([
                        TextInput::make('extra.read_more_text')
                            ->label('Card button text')
                            ->placeholder('Read More')
                            ->maxLength(100),
                        TextInput::make('extra.share_label')
                            ->label('Blog share label')
                            ->placeholder('Share')
                            ->maxLength(50)
                            ->visible(fn (Get $get): bool => $get('key') === 'blog_title'),
                        Placeholder::make('related_help')
                            ->label('')
                            ->content(fn (Get $get): HtmlString => new HtmlString(
                                $get('key') === 'services_title'
                                    ? 'Service cards: edit under <strong>Content → Services</strong>.'
                                    : 'Blog cards: edit under <strong>Content → Blogs</strong>.'
                            ))
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->visible(fn (Get $get): bool => in_array($get('key'), ['services_title', 'blog_title'], true)),

                Section::make('Contact labels & form text')
                    ->description('Actual address / phone / email values: Settings → Site Settings.')
                    ->schema([
                        TextInput::make('extra.address_label')->label('Address card label')->maxLength(100),
                        TextInput::make('extra.phone_label')->label('Phone card label')->maxLength(100),
                        TextInput::make('extra.email_label')->label('Email card label')->maxLength(100),
                        Textarea::make('extra.form_notice')->label('Form notice')->rows(2)->columnSpanFull(),
                        TextInput::make('extra.name_placeholder')->label('Name placeholder')->maxLength(100),
                        TextInput::make('extra.email_placeholder')->label('Email placeholder')->maxLength(100),
                        TextInput::make('extra.subject_placeholder')->label('Subject placeholder')->maxLength(100),
                        TextInput::make('extra.message_placeholder')->label('Message placeholder')->maxLength(100),
                        TextInput::make('extra.submit_text')->label('Submit button')->maxLength(100),
                    ])
                    ->columns(2)
                    ->visible(fn (Get $get): bool => $get('key') === 'contact'),

                Section::make('CTA / background')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Side image')
                            ->disk('public')
                            ->directory('home')
                            ->image(),
                        FileUpload::make('extra.background_image')
                            ->label('Background image')
                            ->disk('public')
                            ->directory('home/backgrounds')
                            ->image()
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->visible(fn (Get $get): bool => $get('key') === 'cta'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')
                    ->label('#')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Home section')
                    ->searchable()
                    ->sortable()
                    ->description(fn (HomeSection $record): string => 'key: '.$record->key),
                TextColumn::make('title')
                    ->label('Headline')
                    ->searchable()
                    ->limit(50)
                    ->placeholder('—'),
                TextColumn::make('subtitle')
                    ->label('Eyebrow')
                    ->limit(30)
                    ->toggleable(),
                IconColumn::make('is_visible')
                    ->label('On home')
                    ->boolean(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_visible')->label('Visible on home'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
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
