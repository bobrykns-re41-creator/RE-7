<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\VinylController;

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
