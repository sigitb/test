<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
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

Route::get("/", function () {
    return redirect()->route("auth.login");
});
Route::controller(AuthController::class)->prefix("auth")->name("auth.")->group(function(){
    Route::get("login", "index")->name("login");
    Route::post("login", "attempt")->name("attempt");
});

Route::middleware("auth")->prefix("admin")->group(function(){
    Route::get("logout", [AuthController::class, "logout"])->name("logout");
    Route::name('admin.')->group(function(){
        Route::controller(ProductController::class)->prefix('product')->name("product.")->group(function(){
            Route::get('list', 'index')->name('index');
            Route::get("import-product", "import")->name("import");
            Route::post("import-product", "store")->name("store");
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });
});
