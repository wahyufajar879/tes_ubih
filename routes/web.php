<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;

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
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('app');
});
Route::resource('siswa', siswaController::class);
Route::get('/chart',function(){
    return view('chart');
});

