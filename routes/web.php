<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaFileController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

Route::get('/raw-file/{path}', MediaFileController::class)
    ->where('path', '.*')
    ->name('raw-file');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [DetailController::class, 'service'])->name('services.show');
Route::get('/prices', [PageController::class, 'prices'])->name('prices');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}', [DetailController::class, 'project'])->name('projects.show');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/team/{slug}', [DetailController::class, 'team'])->name('team.show');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');
