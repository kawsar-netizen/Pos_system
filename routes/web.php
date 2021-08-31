<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserPurchasesController;





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

Route::get('users/{id}/sales',[UserSalesController::class,'index'])->name('user.sales');
Route::post('users/{id}/invoices',[UserSalesController::class,'createInvoice'])->name('user.sales.store');
Route::get('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'SaleinvoiceDetails'])->name('user.sales.SaleinvoiceDetails');
Route::post('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'addItem'])->name('user.sales.invoice.addItems');


Route::get('users/{id}/purchase',[UserPurchasesController::class,'index'])->name('user.purchases');


Route::get('users/{id}/payment',[UserPaymentsController::class,'index'])->name('user.payments');
Route::post('users/{id}/payment',[UserPaymentsController::class,'store'])->name('user.payments.store');
Route::delete('users/{id}/payment/{payment_id}',[UserPaymentsController::class,'destroy'])->name('user.payments.destroy');


Route::get('users/{id}/receipt',[UserReceiptsController::class,'index'])->name('user.receipts');
Route::post('users/{id}/store',[UserReceiptsController::class,'store'])->name('user.receipts.store');
Route::delete('users/{id}/store/{receipt_id}',[UserReceiptsController::class,'destroy'])->name('user.receipts.destroy');

//Categories Route Here......

Route::resource('categories',CategoriesController::class,['except' => ['show']]);

//Products Route Here......

Route::resource('Products',ProductsController::class);


});




