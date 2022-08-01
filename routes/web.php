<?php

use App\Http\Controllers\productcontroller;
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


Route::get('/insert', function () {
    return view('insert');
});
Route::post('/insert',[productcontroller::class,'store']);
Route::get('/insert',[productcontroller::class,'show']);
Route::get('delete/{id}',[productcontroller::class,'destroy']);
Route::get('edit/{id}',[productcontroller::class,'edit']);
Route::post('update/{id}',[productcontroller::class,'update']);
Route::view('acess','acess');
Route::view('no', 'no');
Route::group(['midleware'=>['protected']], function(){
Route::view('user' ,'user');
});
