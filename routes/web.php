<?php

use App\Http\Controllers\TodoController;
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

Route::controller(TodoController::class)->name('todo.')->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/create','create')->name('create');
    Route::get('/update/{todo}','update')->name('update');
    Route::post('/update/{todo}','store_update');
    Route::get('/delete/{todo}','delete')->name('delete')->missing(function(){
        return redirect('/');
    });
});
