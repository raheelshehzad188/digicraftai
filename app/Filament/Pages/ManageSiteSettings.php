<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageSiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 100;

    protected static ?string $title = 'Site Settings';

    protected static string $view = 'filament.pages.manage-site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(SiteSetting::current()->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General')
                    ->schema([
                        TextInput::make('site_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('tagline')
                            ->maxLength(255),
                        FileUpload::make('logo')
                            ->disk('public')
                            ->directory('settings')
                            ->image(),
                        FileUpload::make('favicon')
                            ->disk('public')
                            ->directory('settings')
                            ->image(),
                    ])
                    ->columns(2),
                Section::make('Contact')
                    ->schema([
                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        Textarea::make('address')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Footer & Map')
                    ->schema([
                        Textarea::make('footer_about')
                            ->rows(4)
                            ->columnSpanFull(),
                        FileUpload::make('footer_background_image')
                            ->label('Footer background image')
                            ->disk('public')
                            ->directory('settings/footer')
                            ->image()
                            ->helperText('Full-width background behind the footer section')
                            ->columnSpanFull(),
                        TextInput::make('newsletter_text')
                            ->maxLength(255),
                        TextInput::make('map_embed_url')
                            ->maxLength(1000)
                            ->columnSpanFull(),
                        TextInput::make('copyright_text')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),
                Section::make('Colors')
                    ->schema([
                        ColorPicker::make('primary_color')
                            ->label('Primary color'),
                        ColorPicker::make('secondary_color')
                            ->label('Secondary color'),
                        ColorPicker::make('dark_color')
                            ->label('Header / dark background'),
                        ColorPicker::make('menu_text_color')
                            ->label('Menu item color')
                            ->helperText('Top navigation link color'),
                        ColorPicker::make('menu_hover_color')
                            ->label('Menu hover / active color')
                            ->helperText('Color when menu item is hovered or active'),
                    ])
                    ->columns(3),
                Section::make('Social Links')
                    ->schema([
                        TextInput::make('facebook')
                            ->maxLength(255),
                        TextInput::make('twitter')
                            ->maxLength(255),
                        TextInput::make('linkedin')
                            ->maxLength(255),
                        TextInput::make('instagram')
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ])
            ->statePath('data')
            ->model(SiteSetting::current());
    }

    public function save(): void
    {
        $data = $this->form->getState();

        SiteSetting::current()->update($data);

        Notification::make()
            ->title('Settings saved')
            ->success()
            ->send();
    }

    public function resetToDefaults(): void
    {
        $settings = SiteSetting::current();
        $settings->resetToDefaults();

        $this->form->fill($settings->fresh()->attributesToArray());

        Notification::make()
            ->title('Settings reset to defaults')
            ->success()
            ->send();
    }
}
