<?php

use App\Http\Controllers\RoleController;
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


Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('role')
        ->middleware('can:is-super-admin')
        ->as('role.')
        ->group(function () {
            Route::get("/", [RoleController::class, 'index'])->name('home');
            Route::get("/add", [RoleController::class, 'add'])->name('add');
            Route::post("/store", [RoleController::class, 'store'])->name('store');
            Route::get("/edit/{model}", [RoleController::class, 'edit'])->name('edit');
            Route::post("/update/{model}", [RoleController::class, 'update'])->name('update');
            Route::post("/delete", [RoleController::class, 'delete'])->name('delete');
        });

});


