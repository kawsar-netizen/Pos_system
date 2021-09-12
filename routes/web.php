<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserReportsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\HomeDashboardController;
use App\Http\Controllers\ProductsStockController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\Reports\DayReportsController;
use App\Http\Controllers\Reports\ReportSalesController;
use App\Http\Controllers\Reports\ReportPaymentsController;
use App\Http\Controllers\Reports\ReportReceiptsController;
use App\Http\Controllers\Reports\ReportPurchasesController;





//Login Route Here.....

Route::get('login',[LoginController::class,'login'])->name('login');

Route::post('login',[LoginController::class,'authenticate'])->name('confirm.login');



Route::group(['middleware'=> 'auth'],function(){


//Home Route Here.....
Route::get('/',[HomeDashboardController::class,'index'])->name('home.dashboard');


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
Route::delete('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'sales_destroy'])->name('user.sales.destroy');
Route::post('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'addItem'])->name('user.sales.invoice.addItems');
Route::delete('users/{id}/invoices/{invoice_id}/{item_id}',[UserSalesController::class,'destroy'])->name('user.sales.invoice.deleteItem');


Route::get('users/{id}/purchases',[UserPurchasesController::class,'index'])->name('user.purchases');
Route::post('users/{id}/purchases',[UserPurchasesController::class,'createInvoice'])->name('user.purchase.store');
Route::get('users/{id}/purchases/{invoice_id}',[UserPurchasesController::class,'PurchaseinvoiceDetails'])->name('user.purchases.PurchaseinvoiceDetails');
Route::delete('users/{id}/purchases/{invoice_id}',[UserPurchasesController::class,'purchases_destroy'])->name('user.purchases.destroy');
Route::post('users/{id}/purchases/{invoice_id}',[UserPurchasesController::class,'addItem'])->name('user.purchases.invoice.addItems');
Route::delete('users/{id}/purchases/{invoice_id}/{item_id}',[UserPurchasesController::class,'destroy'])->name('user.purchases.invoice.deleteItem');


Route::get('users/{id}/payment',[UserPaymentsController::class,'index'])->name('user.payments');
Route::post('users/{id}/payment/{invoice_id?}',[UserPaymentsController::class,'store'])->name('user.payments.store');
Route::delete('users/{id}/payment/{payment_id}',[UserPaymentsController::class,'destroy'])->name('user.payments.destroy');


Route::get('users/{id}/receipt',[UserReceiptsController::class,'index'])->name('user.receipts');
Route::post('users/{id}/store/{invoice_id?}',[UserReceiptsController::class,'store'])->name('user.receipts.store');
Route::delete('users/{id}/store/{receipt_id}',[UserReceiptsController::class,'destroy'])->name('user.receipts.destroy');

//Categories Route Here......

Route::resource('categories',CategoriesController::class,['except' => ['show']]);

//Products Route Here......

Route::resource('Products',ProductsController::class);

Route::get('products/stock',[ProductsStockController::class,'index'])->name('stocks.index');

Route::get('report/sales',[ReportSalesController::class,'index'])->name('reports.sales');
Route::get('report/purchases',[ReportPurchasesController::class,'index'])->name('reports.purchases');
Route::get('report/payments',[ReportPaymentsController::class,'index'])->name('reports.payments');
Route::get('report/receipts',[ReportReceiptsController::class,'index'])->name('reports.receipts');

Route::get('report/days',[DayReportsController::class,'index'])->name('reports.days');
Route::get('users/{id}/reports)',[UserReportsController::class,'reports'])->name('user.reports');

});




