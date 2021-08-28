<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserGroupsController;





//Login Route Here.....

Route::get('login',[LoginController::class,'login'])->name('login');

Route::post('login',[LoginController::class,'authenticate'])->name('confirm.login');



Route::group(['middleware'=> 'auth'],function(){

//Home Route Here.....
Route::get('/', function () {
    return view('layout.main');
});   


Route::get('logout',[LoginController::class,'logout'])->name('logout');

//Groups Route Here......
Route::get('groups',[UserGroupsController::class,'index'])->name('groups');

Route::get('groups/create',[UserGroupsController::class,'create'])->name('groups_create');

Route::post('groups',[UserGroupsController::class,'store'])->name('groups_store');

Route::delete('groups/{id}',[UserGroupsController::class,'delete'])->name('groups_delete');


//Users Route Here......

Route::resource('users',UsersController::class);

Route::get('uses/{id}/sales',[UserSalesController::class,'index'])->name('user.sales');

//Categories Route Here......

Route::resource('categories',CategoriesController::class,['except' => ['show']]);

//Products Route Here......

Route::resource('Products',ProductsController::class);


});




