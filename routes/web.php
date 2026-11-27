<?php
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\TrackVisit;

Route::get(
    '/product/search',
    [ProductController::class, 'search']
)->name('product.search');

Route::resource(
    'country',
    CountryController::class
);

Route::resource(
    'product',
    ProductController::class
);

Route::get(
    '/stats/detail',
    [StatsController::class, 'detail']
)->name('stats.detail');

Route::get(
    '/stats/devices',
    [StatsController::class, 'deviceStatics']
)->name('stats.devices');

Route::get(
    '/stats/searches',
    [StatsController::class, 'searchStatics']
)->name('stats.searches');

Route::get(
    '/stats/redirects',
    [StatsController::class, 'redirectStatics']
)->name('stats.redirects');

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


Route::get('/stats',[StatsController::class, 'pages'])->name('stats.pages');
