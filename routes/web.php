<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [\App\Http\Controllers\DetailController::class, 'service'])->name('services.show');
Route::get('/prices', [PageController::class, 'prices'])->name('prices');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}', [\App\Http\Controllers\DetailController::class, 'project'])->name('projects.show');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/team/{slug}', [\App\Http\Controllers\DetailController::class, 'team'])->name('team.show');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');
