<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\OfficeController;
use App\Http\Controllers\User\OfficeUnitController;
use App\Models\OfficeUnitMember;

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


Route::group(['middleware' => 'guest'], function () {
    Route::group(['prefix' => 'register'], function () {
        Route::get('/', [AuthController::class, 'register'])->name('register.view');
        Route::post('/', [AuthController::class, 'store'])->name('register');
    });

    Route::group(['prefix' => 'login'], function () {
        Route::get('/', [AuthController::class, 'loginView'])->name('login.view');
        Route::post('/', [AuthController::class, 'login'])->name('login');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/offices', OfficeController::class);
    Route::group(['prefix' => 'offices'], function () {
        Route::group(['prefix' => '{office}/units'], function () {
            Route::get('/', [OfficeUnitController::class, 'index'])->name('units.index');
            Route::get('/create', [OfficeUnitController::class, 'create'])->name('units.create');
            Route::post('/', [OfficeUnitController::class, 'store'])->name('units.store');
        });

        Route::resource('/units', OfficeUnitController::class, ['except' => ['index', 'create', 'store']]);
        Route::group(['prefix' => 'units/{unit}'], function () {
            Route::resource('/members', OfficeUnitMember::class, ['except' => ['edit', 'update']]);
        });
    });
});
