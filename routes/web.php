<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| https://www.youtube.com/user/enjoytutorials/videos
*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/partido', [App\Http\Controllers\HomeController::class, 'partido'])->name('partido');
Route::view('/admin/login',function(){
    return view('auth.login');
});

Route::prefix('admin')->group(function () {
    
    Route::get('/',[App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/admPartido',[App\Http\Controllers\AdmPartidoController::class, 'index']);
    Route::post('/admPartido',[App\Http\Controllers\AdmPartidoController::class, 'store']);
    Route::post('/admPartido/edit',[App\Http\Controllers\AdmPartidoController::class, 'editarPartido']);


    Route::delete('/admPartido/{partido}',[App\Http\Controllers\AdmPartidoController::class, 'destroy'])->name('partido.destroy');

    Route::get('/admJugadores',[App\Http\Controllers\AdmJugadoresController::class, 'index']);
    Route::post('/admJugadores',[App\Http\Controllers\AdmJugadoresController::class, 'store']);
    Route::delete('/admJugadores/{jugador}',[App\Http\Controllers\AdmJugadoresController::class, 'destroy'])->name('jugador.destroy');  
});


Auth::routes();



