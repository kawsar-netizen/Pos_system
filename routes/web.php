<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserGroupsController;



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

Route::resource('users',UsersController::class);

//Categories Route Here......

Route::resource('categories',CategoriesController::class,['except' => ['show']]);

//Products Route Here......

Route::resource('Products',ProductsController::class);