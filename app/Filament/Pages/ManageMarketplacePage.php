<?php

namespace App\Filament\Pages;

use App\Filament\Concerns\AuthorizesPanelRole;
use App\Filament\Forms\SeoForm;
use App\Models\Page;
use App\Support\CatalogPages;
use App\Support\SoftwareDefaults;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page as FilamentPage;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageMarketplacePage extends FilamentPage
{
    use AuthorizesPanelRole;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'Marketplace';

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationLabel = 'Page Settings';

    protected static ?string $title = 'Marketplace Page Settings';

    protected static ?string $slug = 'marketplace-page-settings';

    /** @var array<string, mixed>|null */
    public ?array $data = [];

    /**
     * @return list<string>
     */
    protected static function allowedRoles(): array
    {
        return ['market'];
    }

    public function mount(): void
    {
        $page = $this->page();
        $defaults = SoftwareDefaults::marketplacePageSections();
        $sections = array_replace($defaults, $page->sections ?? []);

        $this->form->fill(array_merge($sections, [
            'title' => $page->title,
            'slug' => $page->slug,
            'breadcrumb_title' => $page->breadcrumb_title,
            'banner_image' => $page->banner_image,
            'meta_title' => $page->meta_title,
            'meta_description' => $page->meta_description,
            'meta_keywords' => $page->meta_keywords,
            'og_title' => $page->og_title,
            'og_description' => $page->og_description,
            'og_image' => $page->og_image,
            'og_type' => $page->og_type,
            'twitter_title' => $page->twitter_title,
            'twitter_description' => $page->twitter_description,
            'twitter_image' => $page->twitter_image,
            'twitter_card' => $page->twitter_card,
            'canonical_url' => $page->canonical_url,
            'robots' => $page->robots,
            'schema_markup' => $page->schema_markup,
            'meta_author' => $page->meta_author,
        ]));
    }

    public function defaultForm(Schema $schema): Schema
    {
        return $schema
            ->operation('edit')
            ->statePath('data');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')->label('Page Title')->required(),
                        TextInput::make('slug')
                            ->label('Page URL slug')
                            ->prefix('/')
                            ->required()
                            ->helperText('Frontend URL, e.g. market becomes /market'),
                        TextInput::make('breadcrumb_title')->label('Breadcrumb'),
                        TextInput::make('hero_kicker'),
                        TextInput::make('hero_title')->columnSpanFull(),
                        Textarea::make('hero_description')->rows(3)->columnSpanFull(),
                        TextInput::make('search_placeholder')->columnSpanFull(),
                        FileUpload::make('hero_image')
                            ->image()
                            ->directory('pages/marketplace')
                            ->disk('public'),
                        FileUpload::make('banner_image')
                            ->label('Breadcrumb / page banner')
                            ->image()
                            ->directory('pages/banners')
                            ->disk('public'),
                    ]),
                Section::make('Section titles')
                    ->columns(2)
                    ->schema([
                        TextInput::make('categories_title'),
                        TextInput::make('categories_subtitle'),
                        TextInput::make('featured_title'),
                        TextInput::make('featured_subtitle'),
                        TextInput::make('latest_title'),
                        TextInput::make('latest_subtitle'),
                        TextInput::make('why_title'),
                        TextInput::make('why_subtitle'),
                    ]),
                Section::make('Seller + CTA')
                    ->columns(2)
                    ->schema([
                        TextInput::make('seller_title')->columnSpanFull(),
                        Textarea::make('seller_text')->rows(2)->columnSpanFull(),
                        FileUpload::make('seller_image')
                            ->image()
                            ->directory('pages/marketplace')
                            ->disk('public')
                            ->columnSpanFull(),
                        TextInput::make('cta_title')->columnSpanFull(),
                        Textarea::make('cta_text')->rows(2)->columnSpanFull(),
                        TextInput::make('cta_primary_text'),
                        TextInput::make('cta_secondary_text'),
                    ]),
                Section::make('Trust items')
                    ->schema([
                        Repeater::make('trust')
                            ->schema([
                                TextInput::make('icon'),
                                TextInput::make('title')->required(),
                                TextInput::make('text'),
                            ])
                            ->columns(3)
                            ->defaultItems(0),
                    ]),
                Section::make('Benefits')
                    ->schema([
                        Repeater::make('benefits')
                            ->schema([
                                TextInput::make('icon'),
                                TextInput::make('title')->required(),
                                TextInput::make('text'),
                            ])
                            ->columns(3)
                            ->defaultItems(0),
                    ]),
                SeoForm::section()->collapsed(false),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $page = $this->page();
        $current = $page->sections ?? [];

        $seoKeys = [
            'title', 'slug', 'breadcrumb_title', 'banner_image', 'meta_title', 'meta_description', 'meta_keywords',
            'meta_author', 'og_title', 'og_description', 'og_image', 'og_type',
            'twitter_title', 'twitter_description', 'twitter_image', 'twitter_card',
            'canonical_url', 'robots', 'schema_markup',
        ];

        $seo = [];
        foreach ($seoKeys as $key) {
            $seo[$key] = $data[$key] ?? null;
            unset($data[$key]);
        }

        $slugCheck = CatalogPages::sanitizeSlug((string) ($seo['slug'] ?? $page->slug), $page, CatalogPages::MARKETPLACE);
        if (! $slugCheck['ok']) {
            Notification::make()->title($slugCheck['message'])->danger()->send();

            return;
        }
        $seo['slug'] = $slugCheck['slug'];
        $seo['system_key'] = CatalogPages::MARKETPLACE;

        foreach (['hero_image', 'seller_image'] as $imageKey) {
            if (blank($data[$imageKey] ?? null)) {
                $data[$imageKey] = $current[$imageKey] ?? SoftwareDefaults::marketplacePageSections()[$imageKey] ?? null;
            }
        }

        $page->forceFill(array_merge($seo, [
            'sections' => array_replace(SoftwareDefaults::marketplacePageSections(), $current, $data),
            'is_published' => true,
        ]))->save();

        CatalogPages::forgetCache();

        Notification::make()->title('Marketplace page settings saved')->success()->send();
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([EmbeddedSchema::make('form')])
                    ->id('form')
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->label('Save settings')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ]);
    }

    protected function page(): Page
    {
        return CatalogPages::ensure(CatalogPages::MARKETPLACE, [
            'title' => 'Marketplace',
            'breadcrumb_title' => 'Marketplace',
            'template' => 'default',
            'is_published' => true,
            'sections' => SoftwareDefaults::marketplacePageSections(),
        ]);
    }
}
