<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\componentTestController;
use App\Http\Controllers\LifeCycleTestController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/component-test1', [componentTestController::class, 'showcomponent1']);
Route::get('/component-test2', [componentTestController::class, 'showcomponent2']);               
Route::get('/servicecontainertest', [LifeCycleTestController::class, 'showservicecontainertest']);  
Route::get('/serviceprovidertest', [LifeCycleTestController::class, 'showserviceprovidertest']);  

require __DIR__.'/auth.php';
