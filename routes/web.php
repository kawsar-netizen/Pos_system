<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupsController;

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
//Home Route Here.....
Route::get('/', function () {
    return view('layout.main');
});

//Groups Route Here......
Route::get('groups',[UserGroupsController::class,'index'])->name('groups');

Route::get('groups/create',[UserGroupsController::class,'create'])->name('groups_create');

Route::post('groups',[UserGroupsController::class,'store'])->name('groups_store');

Route::delete('groups/{id}',[UserGroupsController::class,'delete'])->name('groups_delete');


//Users Route Here......
Route::get('users',[UserController::class,'index'])->name('users');

Route::get('users/create',[UserController::class,'create'])->name('create');

Route::post('users/store',[UserController::class,'user_store'])->name('store');

Route::post('users/edit/{id}',[UserController::class,'user_edit'])->name('user_edit');

// Route::get('users/{id}',[UserController::class,'usershow'])->name('user_show');

// Route::get('users/{id}/edit',[UserController::class,'useredit'])->name('user_edit');

// Route::put('users/{id}/update',[UserController::class,'userupdate'])->name('user_update');

// Route::delete('users/{id}/delete',[UserController::class,'userdelete'])->name('user_delete');


