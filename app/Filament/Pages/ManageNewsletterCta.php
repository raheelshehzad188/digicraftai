<?php

namespace App\Filament\Pages;

use App\Models\HomeSection;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageNewsletterCta extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'CMS';

    protected static ?int $navigationSort = 5;

    protected static ?string $title = 'Newsletter CTA';

    protected static ?string $navigationLabel = 'Newsletter CTA';

    protected static string $view = 'filament.pages.manage-newsletter-cta';

    public ?array $data = [];

    public function mount(): void
    {
        $cta = HomeSection::byKey('cta') ?? HomeSection::query()->create([
            'key' => 'cta',
            'name' => 'Call To Action',
            'title' => 'Sign Up To Our Newsletter To Get The Latest Offers',
            'button_text' => 'Subscribe',
            'is_visible' => true,
            'sort_order' => 48,
        ]);

        $this->form->fill([
            'title' => $cta->title,
            'content' => $cta->content,
            'button_text' => $cta->button_text,
            'image' => $cta->image,
            'background_image' => $cta->extra['background_image'] ?? null,
            'is_visible' => $cta->is_visible,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Newsletter / CTA Section')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->columnSpanFull(),
                        TextInput::make('button_text')
                            ->default('Subscribe'),
                        Toggle::make('is_visible')
                            ->label('Show on Home page')
                            ->default(true),
                        FileUpload::make('image')
                            ->label('Side circle image')
                            ->disk('public')
                            ->directory('home')
                            ->image(),
                        FileUpload::make('background_image')
                            ->label('Background image')
                            ->disk('public')
                            ->directory('home/backgrounds')
                            ->image()
                            ->helperText('This is the full section background behind the newsletter block')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $cta = HomeSection::byKey('cta') ?? HomeSection::query()->create([
            'key' => 'cta',
            'name' => 'Call To Action',
            'sort_order' => 48,
        ]);

        $cta->update([
            'title' => $data['title'] ?? null,
            'content' => $data['content'] ?? null,
            'button_text' => $data['button_text'] ?? 'Subscribe',
            'image' => $data['image'] ?? null,
            'is_visible' => (bool) ($data['is_visible'] ?? true),
            'extra' => array_merge($cta->extra ?? [], [
                'background_image' => $data['background_image'] ?? null,
            ]),
        ]);

        Notification::make()
            ->title('Newsletter CTA saved')
            ->success()
            ->send();
    }
}
