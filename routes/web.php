<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\FiberController;
use App\Http\Controllers\WirelessController;
//use App\Http\Controllers\Auth;


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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('fiber', 'FiberController@index');

//Route::get('/servicios', [App\Http\Controllers\serviciosController::class, 'index'])->name('servicios');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('fibers', FiberController::class);
    Route::resource('wireless', WirelessController::class);
    Route::resource('devices', DeviceController::class);
    //Route::resource('servicios', serviciosController::class);
});