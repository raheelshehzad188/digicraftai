<?php

namespace App\View\Composers;

use App\Models\MenuItem;
use App\Models\SiteSetting;
use Illuminate\View\View;

class SiteComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'settings' => SiteSetting::current(),
            'menuItems' => MenuItem::with(['children' => fn ($q) => $q->where('is_active', true)->orderBy('sort_order'), 'page'])
                ->whereNull('parent_id')
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get(),
        ]);
    }
}
