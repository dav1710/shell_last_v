<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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
Route::get('/optimize', function() {
    Artisan::call("config:cache");
    Artisan::call("view:clear");
    return 'Optimized cache';
});
Route::get('/config-clear', function() {
    Artisan::call("config:cache");
    return 'Optimized config';
});
Route::get('/migrate', function() {
    Artisan::call("migrate");
    return 'Migrated';
});
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/faq', [HomeController::class, 'faq'])->name('faqPage');
Route::get('/products', [HomeController::class, 'product'])->name('more_product');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

Route::post('/hash', [LangController::class, 'hash']);
Route::get('locale/{language}', [LangController::class, 'language']);

Route::get('/markers', function () {
    $markers = DB::table('maps')->get();
    return response()->json($markers);
});
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {
        Route::resources([
			'slide' => SlideController::class,
			'service' => ServiceController::class,
			'product' => ProductController::class,
			'contact' => ContactController::class,
			'about' => AboutController::class,
			'map' => MapController::class,
			'faq' => FaqController::class,
		]);
    });
});
