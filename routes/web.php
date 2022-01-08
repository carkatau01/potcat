<?php

use App\Http\Controllers\Web\CompanyController;
use App\Http\Controllers\ClickCounterController;

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
    return view('welcome');
});

Route::get('/companies', [CompanyController::class, 'index'])->name('company.list');
Route::get('/company/{id}', [CompanyController::class, 'show'])->name('company.show');

Route::get('/tracking-redirect', [ClickCounterController::class, 'trackingRedirect'])->name('tracking.redirect');
