<?php

use App\Http\Controllers\FileHippoController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ImageToolController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PlanSubscribeController;
use App\Support\CatalogPages;
use App\Support\ImageTools;
use App\Support\ToolsPreview;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/quote/{service:slug?}', [FrontendController::class, 'quote'])->name('quote');
Route::post('/quote', [FrontendController::class, 'quoteSubmit'])->name('quote.submit');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::get('/plan/{plan}/subscribe', [PlanSubscribeController::class, 'show'])->name('plan.subscribe');
Route::post('/plan/{plan}/subscribe', [PlanSubscribeController::class, 'store'])->name('plan.subscribe.submit');

$marketplaceSlug = CatalogPages::slug(CatalogPages::MARKETPLACE, 'marketplace');
$softwareSlug = CatalogPages::slug(CatalogPages::SOFTWARE, 'filehippo');

Route::get('/'.$marketplaceSlug, [MarketplaceController::class, 'index'])->name('marketplace.index');
Route::get('/'.$marketplaceSlug.'/{product:slug}', [MarketplaceController::class, 'show'])->name('marketplace.show');
Route::get('/'.$softwareSlug, [FileHippoController::class, 'index'])->name('filehippo.index');
Route::get('/'.$softwareSlug.'/{software}', [FileHippoController::class, 'show'])->name('filehippo.show');

foreach (['marketplace'] as $legacy) {
    if ($legacy !== $marketplaceSlug) {
        Route::redirect('/'.$legacy, '/'.$marketplaceSlug, 301);
        Route::get('/'.$legacy.'/{product}', fn (string $product) => redirect('/'.$marketplaceSlug.'/'.$product, 301));
    }
}

foreach (['filehippo', 'software'] as $legacy) {
    if ($legacy !== $softwareSlug) {
        Route::redirect('/'.$legacy, '/'.$softwareSlug, 301);
        Route::get('/'.$legacy.'/{software}', fn (string $software) => redirect('/'.$softwareSlug.'/'.$software, 301));
    }
}

Route::get('/preview/{token}', function (string $token) {
    abort_unless(ToolsPreview::tokenMatches($token), 404);

    return redirect()->route('home')->cookie(cookie(
        (string) config('tools-preview.cookie'),
        '1',
        60 * 24 * 30
    ));
})->name('tools.preview');

Route::get('/preview/{token}/off', function (string $token) {
    abort_unless(ToolsPreview::tokenMatches($token), 404);

    return redirect()->route('home')->withoutCookie((string) config('tools-preview.cookie'));
})->name('tools.preview.off');

Route::get('/image-tools', [ImageToolController::class, 'index'])->name('image-tools.index');
Route::get('/{tool}', [ImageToolController::class, 'show'])
    ->whereIn('tool', ImageTools::slugs())
    ->name('image-tools.show');

Route::get('/services', [FrontendController::class, 'services'])->name('services.index');
Route::get('/services/{service:slug}', [FrontendController::class, 'serviceShow'])->name('services.show');
Route::get('/team', [FrontendController::class, 'team'])->name('team.index');
Route::get('/team/{member:slug}', [FrontendController::class, 'teamShow'])->name('team.show');
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects.index');
Route::get('/projects/{project:slug}', [FrontendController::class, 'projectShow'])->name('projects.show');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog.index');
Route::get('/blog/{post:slug}', [FrontendController::class, 'blogShow'])->name('blog.show');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/page/{page:slug}', [FrontendController::class, 'page'])->name('pages.show.prefixed');
Route::get('/{page:slug}', [FrontendController::class, 'page'])
    ->where('page', '^(?!'.CatalogPages::routeExclusions().').*$')
    ->name('pages.show');
