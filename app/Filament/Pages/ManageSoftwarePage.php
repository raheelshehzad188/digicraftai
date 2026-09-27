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
class ManageSoftwarePage extends FilamentPage
{
    use AuthorizesPanelRole;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'Software';

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationLabel = 'Page Settings';

    protected static ?string $title = 'Software Page Settings';

    protected static ?string $slug = 'software-page-settings';

    /** @var array<string, mixed>|null */
    public ?array $data = [];

    /**
     * @return list<string>
     */
    protected static function allowedRoles(): array
    {
        return ['software'];
    }

    public function mount(): void
    {
        $page = $this->page();
        $defaults = SoftwareDefaults::pageSections();
        $sections = array_replace($defaults, $page->sections ?? []);

        $this->form->fill(array_merge($sections, [
            'title' => $page->title,
            'slug' => $page->slug,
            'breadcrumb_title' => $page->breadcrumb_title,
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
                            ->helperText('Frontend URL, e.g. software becomes /software'),
                        TextInput::make('breadcrumb_title')->label('Breadcrumb'),
                        TextInput::make('hero_kicker'),
                        TextInput::make('hero_title')->columnSpanFull(),
                        Textarea::make('hero_description')->rows(3)->columnSpanFull(),
                        TextInput::make('search_placeholder')->columnSpanFull(),
                        FileUpload::make('hero_image')
                            ->image()
                            ->directory('pages/software')
                            ->disk('public')
                            ->columnSpanFull(),
                    ]),
                Section::make('List + Subscribe')
                    ->columns(2)
                    ->schema([
                        TextInput::make('list_subtitle')->columnSpanFull(),
                        TextInput::make('subscribe_title')->columnSpanFull(),
                        Textarea::make('subscribe_text')->rows(2)->columnSpanFull(),
                    ]),
                Section::make('Trust items')
                    ->schema([
                        Repeater::make('trust')
                            ->schema([
                                TextInput::make('icon')->placeholder('fas fa-shield-alt'),
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
            'title', 'slug', 'breadcrumb_title', 'meta_title', 'meta_description', 'meta_keywords',
            'meta_author', 'og_title', 'og_description', 'og_image', 'og_type',
            'twitter_title', 'twitter_description', 'twitter_image', 'twitter_card',
            'canonical_url', 'robots', 'schema_markup',
        ];

        $seo = [];
        foreach ($seoKeys as $key) {
            $seo[$key] = $data[$key] ?? null;
            unset($data[$key]);
        }

        $slugCheck = CatalogPages::sanitizeSlug((string) ($seo['slug'] ?? $page->slug), $page, CatalogPages::SOFTWARE);
        if (! $slugCheck['ok']) {
            Notification::make()->title($slugCheck['message'])->danger()->send();

            return;
        }
        $seo['slug'] = $slugCheck['slug'];
        $seo['system_key'] = CatalogPages::SOFTWARE;

        if (blank($data['hero_image'] ?? null)) {
            $data['hero_image'] = $current['hero_image'] ?? SoftwareDefaults::pageSections()['hero_image'];
        }

        $page->forceFill(array_merge($seo, [
            'sections' => array_replace(SoftwareDefaults::pageSections(), $current, $data),
            'is_published' => true,
        ]))->save();

        CatalogPages::forgetCache();

        Notification::make()->title('Software page settings saved')->success()->send();
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
        return CatalogPages::ensure(CatalogPages::SOFTWARE, [
            'title' => 'Software Downloads',
            'breadcrumb_title' => 'Software',
            'template' => 'default',
            'is_published' => true,
            'sections' => SoftwareDefaults::pageSections(),
        ]);
    }
}
