<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Support\CatalogPages;
use App\Support\SoftwareDefaults;
use App\Support\SystemPages;
use Illuminate\Console\Command;

class SeedSoftwareCommand extends Command
{
    protected $signature = 'software:seed';

    protected $description = 'Create software categories/items and page copy if the catalog is empty';

    public function handle(): int
    {
        SystemPages::ensure();
        $count = SoftwareDefaults::apply();

        $page = CatalogPages::ensure(CatalogPages::SOFTWARE, [
            'title' => 'Software Downloads',
            'breadcrumb_title' => 'FileHippo',
            'template' => 'default',
            'is_published' => true,
            'meta_title' => 'Software Downloads',
        ]);

        if (blank($page->sections)) {
            $page->forceFill(['sections' => SoftwareDefaults::pageSections()])->save();
        } else {
            $page->forceFill(['sections' => array_replace(SoftwareDefaults::pageSections(), $page->sections)])->save();
        }

        $market = CatalogPages::ensure(CatalogPages::MARKETPLACE, [
            'title' => 'Marketplace',
            'breadcrumb_title' => 'Marketplace',
            'template' => 'default',
            'is_published' => true,
        ]);

        if (blank($market->sections)) {
            $market->forceFill(['sections' => SoftwareDefaults::marketplacePageSections()])->save();
        } else {
            $market->forceFill(['sections' => array_replace(SoftwareDefaults::marketplacePageSections(), $market->sections)])->save();
        }

        $this->ensurePanelUser('software@digicraftsai.com', 'Software Manager', 'software');
        $this->ensurePanelUser('market@digicraftsai.com', 'Market Manager', 'market');

        $this->info('Software items: '.$count);
        $this->info('Panel users ready: software@digicraftsai.com / market@digicraftsai.com');

        return self::SUCCESS;
    }

    protected function ensurePanelUser(string $email, string $name, string $role): void
    {
        $user = \App\Models\User::query()->firstOrNew(['email' => $email]);
        $user->name = $user->name ?: $name;
        $user->role = $role;

        if (! $user->exists) {
            $user->password = env('SEED_PANEL_PASSWORD', 'password');
        }

        $user->save();
    }
}
