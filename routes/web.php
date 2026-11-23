<?php
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MarketController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/say/{message?}',
    [SiteController::class, 'say']
)->name('site.say');

Route::view(
    '/about',
    'site.about'
)->name('site.about');

Route::view(
    '/contact',
    'site.contact'
)->name('site.contact');

Route::view(
    '/catalog',
    'catalog'
)->name('catalog');

Route::get(
    '/product/{id?}',
    [MarketController::class, 'product']
)->name('product.form');
Route::post(
    '/product/',
    [MarketController::class, 'productOrder']
)->name('product.order');



Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/entry',
    [SiteController::class, 'entry']
)->name('entry.form');

Route::post(
    '/entry',
    [SiteController::class, 'entryStore']
)->name('entry.store');
