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
            'years' => $about->extra['years'] ?? '20',
            'years_label' => $about->extra['years_label'] ?? 'Years Of Experiences',
            'features' => $about->extra['features'] ?? [
                ['icon' => 'fa-city', 'line1' => 'Building', 'line2' => 'Cleaning'],
                ['icon' => 'fa-school', 'line1' => 'Education', 'line2' => 'center'],
                ['icon' => 'fa-warehouse', 'line1' => 'Warehouse', 'line2' => 'Cleaning'],
                ['icon' => 'fa-hospital', 'line1' => 'Hospital', 'line2' => 'Cleaning'],
            ],
            'is_visible' => $about->is_visible,
            'show_cta' => (bool) ($about->extra['show_cta'] ?? true),
            'show_team' => (bool) ($about->extra['show_team'] ?? true),
            'show_testimonials' => (bool) ($about->extra['show_testimonials'] ?? true),
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
                        FileUpload::make('image')->disk('public')->directory('home')->image(),
                        TextInput::make('button_text'),
                        TextInput::make('button_url'),
                        TextInput::make('years')->label('Years number'),
                        TextInput::make('years_label')->label('Years label'),
                    ])
                    ->columns(2),
                Section::make('Feature Boxes')
                    ->schema([
                        Repeater::make('features')
                            ->schema([
                                TextInput::make('icon')->placeholder('fa-city')->required(),
                                TextInput::make('line1')->required(),
                                TextInput::make('line2'),
                            ])
                            ->columns(3)
                            ->collapsible(),
                    ]),
                Section::make('Other About Page Sections')
                    ->description('These toggles only affect /about — Home page sections stay independent. Edit team/testimonial/CTA content in their own menus.')
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
                'years' => $data['years'] ?? '20',
                'years_label' => $data['years_label'] ?? 'Years Of Experiences',
                'features' => $data['features'] ?? [],
                'show_cta' => (bool) ($data['show_cta'] ?? true),
                'show_team' => (bool) ($data['show_team'] ?? true),
                'show_testimonials' => (bool) ($data['show_testimonials'] ?? true),
            ]),
        ]);

        Notification::make()->title('About page saved')->success()->send();
    }
}
