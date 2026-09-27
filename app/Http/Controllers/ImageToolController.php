<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Support\ImageTools;
use App\Support\ToolsPreview;
use Illuminate\View\View;

class ImageToolController extends Controller
{
    public function index(): View
    {
        abort_unless(ToolsPreview::enabled(), 404);

        return view('frontend.image-tools.index', [
            'categories' => ImageTools::categories(),
            'seo' => $this->seo('All Image Tools', 'Access all image editing, optimization, conversion and creation tools in one place.'),
        ]);
    }

    public function show(string $tool): View
    {
        abort_unless(ToolsPreview::enabled(), 404);

        $item = ImageTools::find($tool);

        abort_unless($item, 404);

        return view('frontend.image-tools.show', [
            'tool' => $item,
            'seo' => $this->seo($item['name'], $item['description']),
        ]);
    }

    private function seo(string $title, string $description): Page
    {
        return new Page([
            'title' => $title,
            'meta_title' => $title,
            'meta_description' => $description,
        ]);
    }
}
