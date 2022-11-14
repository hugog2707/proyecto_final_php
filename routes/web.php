<?php

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\LibroController;

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
    //Cookie::queue('MiCookie2', 'valor', 60);
    //return view('welcome');
    //return response('Hola mundo')->cookie('MiCookie','Valor',60);
    return response(view('welcome'))->cookie('MiCookie','Valor',60);

    //return Cookie::get('laravel_session');
});

/*
Route::get('/sexo', function () {
    return redirect('/sexos');
});
*/

Route::resource('sexos', SexoController::class);
Route::resource('autores', AutorController::class)->parameters(['autores' => 'autor']);

Route::resource('idiomas', IdiomaController::class);
Route::resource('libros', LibroController::class)->parameters(['libros' => 'libro']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
