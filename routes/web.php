<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menu;
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

Route:: get('tipo_usuario',[menu:: class, 'showT']);
Route:: get('tipo_especialidad',[menu:: class, 'showE']);
Route:: get('tipo_registropersona',[menu:: class, 'showP']);