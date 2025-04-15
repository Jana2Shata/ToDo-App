<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TodoController::class,'index'])->name('index');

Route::get('create', [TodoController::class,'create'])->name('create'); // namings are essential!!

Route::get('details/{todo}', [TodoController::class,'details'])->name('details');

Route::get('edit/{todo}', [TodoController::class,'edit'])->name('edit');

Route::put('update/{todo}', [TodoController::class,'update'])->name('update');

Route::get('delete/{todo}', [TodoController::class,'delete'])->name('delete');

Route::post('store-data', [TodoController::class,'store'])->name('store');
// post to send data to a server
// 'store-data' is the action in the form of create.blade.php