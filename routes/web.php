<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArrayController;
use App\Http\Controllers\GroupByOwnersController;
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
Route::group(['Challenges/'], function($route){
    $route->get('2', [ArrayController::class, 'index'])->name('get.duplicates');
    $route->get('4',[GroupByOwnersController::class, 'index'])->name('groupby.owners');
});

