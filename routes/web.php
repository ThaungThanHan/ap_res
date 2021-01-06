<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\OrdersController;

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

Auth::routes([          // Auth::routes(); ka default akone pr tal. Ae dr mha m lo tr phyote yin [] nae false htr lite 
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);
Route::get('/orders', [OrdersController::class, 'index']);
Route::resource('/dishes', App\Http\Controllers\DishesController::class);  // controller tat tat pl so array [] htae syr m loss