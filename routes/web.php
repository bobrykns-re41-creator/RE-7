<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\VinylController;
use App\Http\Middleware\TrackVisit;
use App\Http\Controllers\StatsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/say/{message?}',
    [SiteController::class, 'say']
)->name('site.say');

Route::get(
    '/entry',
    [SiteController::class, 'entry']
)->name('entry.form');

Route::post(
    '/entry',
    [SiteController::class, 'entryStore']
)->name('entry.store');

Route::view(
    '/about',
    'site.about'
)->name('site.about');

Route::get(
    '/contact',
    [SiteController::class, 'contact']
)->name('contact.form');

Route::post('/contact',
    [SiteController::class, 'contactSubmit']
)->name('contact.store');

Route::resource(
    'country',
    CountryController::class
);

Route::resource('vinyls', VinylController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stats',[StatsController::class, 'pages'])
    ->name('stats.pages');

Route::get(
    '/stats/detail',
    [StatsController::class, 'detail']
)->name('stats.detail');

Route::get('/stats/popular', [StatsController::class, 'popularVinyls'])->name('stats.popular');
