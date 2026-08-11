<?php

namespace App\Filament\Pages;

use App\Models\HomeSection;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageAboutPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationGroup = 'CMS';

    protected static ?int $navigationSort = 4;

    protected static ?string $title = 'About Page';

    protected static ?string $navigationLabel = 'About Page';

    protected static string $view = 'filament.pages.manage-about-page';

    public ?array $data = [];

    public function mount(): void
    {
        $about = HomeSection::byKey('about') ?? HomeSection::query()->create([
            'key' => 'about',
            'name' => 'About Section',
            'is_visible' => true,
            'sort_order' => 2,
        ]);

        $this->form->fill([
            'banner_title' => $about->extra['banner_title'] ?? 'About',
            'subtitle' => $about->subtitle,
            'title' => $about->title,
            'content' => $about->content,
            'button_text' => $about->button_text,
            'button_url' => $about->button_url,
            'image' => $about->image,
            'image_2' => $about->extra['image_2'] ?? null,
            'years' => $about->extra['years'] ?? '20',
            'years_label' => $about->extra['years_label'] ?? 'Years Of Experiences',
            'facts' => $about->extra['facts'] ?? [
                ['value' => '99', 'label' => 'Success in getting happy customer'],
                ['value' => '25', 'label' => 'Thousands of successful business'],
                ['value' => '120', 'label' => 'Total clients who love HighTech'],
                ['value' => '5', 'label' => 'Stars reviews given by satisfied clients'],
            ],
            'features' => $about->extra['features'] ?? [],
            'is_visible' => $about->is_visible,
            'show_cta' => (bool) ($about->extra['show_cta'] ?? false),
            'show_team' => (bool) ($about->extra['show_team'] ?? false),
            'show_testimonials' => (bool) ($about->extra['show_testimonials'] ?? false),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Page Header')
                    ->schema([
                        TextInput::make('banner_title')->required(),
                        Toggle::make('is_visible')->label('Show About section')->default(true),
                    ])
                    ->columns(2),
                Section::make('About Content')
                    ->schema([
                        TextInput::make('subtitle')->label('Badge text'),
                        TextInput::make('title')->label('Headline'),
                        RichEditor::make('content')->columnSpanFull(),
                        FileUpload::make('image')->label('About image 1')->disk('public')->directory('home')->image(),
                        FileUpload::make('image_2')->label('About image 2')->disk('public')->directory('home')->image(),
                        TextInput::make('button_text'),
                        TextInput::make('button_url'),
                    ])
                    ->columns(2),
                Section::make('Fact Counters')
                    ->schema([
                        Repeater::make('facts')
                            ->schema([
                                TextInput::make('value')->required(),
                                TextInput::make('label')->required(),
                            ])
                            ->columns(2)
                            ->defaultItems(4)
                            ->collapsible(),
                    ]),
                Section::make('Feature Boxes')
                    ->schema([
                        Repeater::make('features')
                            ->schema([
                                TextInput::make('icon')->placeholder('fa-city'),
                                TextInput::make('line1'),
                                TextInput::make('line2'),
                            ])
                            ->columns(3)
                            ->collapsible(),
                    ]),
                Section::make('Other About Page Sections')
                    ->description('These toggles only affect /about — Home page sections stay independent.')
                    ->schema([
                        Toggle::make('show_cta')->label('Show Newsletter CTA on About'),
                        Toggle::make('show_team')->label('Show Team on About'),
                        Toggle::make('show_testimonials')->label('Show Testimonials on About'),
                    ])
                    ->columns(3),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $about = HomeSection::byKey('about') ?? HomeSection::query()->create([
            'key' => 'about',
            'name' => 'About Section',
            'sort_order' => 2,
        ]);

        $about->update([
            'subtitle' => $data['subtitle'] ?? null,
            'title' => $data['title'] ?? null,
            'content' => $data['content'] ?? null,
            'button_text' => $data['button_text'] ?? null,
            'button_url' => $data['button_url'] ?? null,
            'image' => $data['image'] ?? null,
            'is_visible' => (bool) ($data['is_visible'] ?? true),
            'extra' => array_merge($about->extra ?? [], [
                'banner_title' => $data['banner_title'] ?? 'About',
                'image_2' => $data['image_2'] ?? null,
                'years' => $data['years'] ?? '20',
                'years_label' => $data['years_label'] ?? 'Years Of Experiences',
                'facts' => $data['facts'] ?? [],
                'features' => $data['features'] ?? [],
                'show_cta' => (bool) ($data['show_cta'] ?? false),
                'show_team' => (bool) ($data['show_team'] ?? false),
                'show_testimonials' => (bool) ($data['show_testimonials'] ?? false),
            ]),
        ]);

        Notification::make()->title('About page saved')->success()->send();
    }
}
