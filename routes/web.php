<?php

use App\Http\Controllers\CustomerController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return inertia::render('index');
});

Route::get('customers/create', [CustomerController::class, 'create']);
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('customers', [CustomerController::class, 'store']);
Route::delete('customers/{customer}', [CustomerController::class, 'destroy']);
Route::get('customers/{customer}/edit', [CustomerController::class, 'edit']);
Route::put('customers/{customer}', [CustomerController::class, 'update']);
