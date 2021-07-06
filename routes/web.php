<?php

use App\Http\Controllers\Posts;
use App\Http\Controllers\Prices;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('account.index');
})->middleware(['auth'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::get('adverts', [Posts::class, 'listPost'])->name('adverts');
    Route::get('myadverts', [Posts::class, 'listOwnPost'])->name('my_adverts');
    Route::get('advertoffers', [Posts::class, 'listAdvertOffers'])->name('advert_offers');
    Route::get('advert/{id}', [Posts::class, 'viewPost'])->name('advert');
    Route::post('advert/{id}', [Posts::class, 'makeOffer']);
    Route::get('prices', [Prices::class, 'view'])->name('prices');
    Route::post('prices', [Prices::class, 'create']);
    Route::get('advertscreate', [Posts::class, 'createView'])->name('createadverts');
    Route::post('advertscreate', [Posts::class, 'createPost']);
});
require __DIR__.'/auth.php';
