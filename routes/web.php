<?php

// use Illuminate\Support\Facades\Route;
use App\Fuser;
use App\Http\Controllers\DashboardController as Dash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('FrontAuth.xlogin');
});
Route::get('/admin', function () {
    return view('auth.login');
});
Auth::routes();
include 'frontend.php';


Route::group([
    'namespace' => 'App\Http\Controllers',
],function(){


Route::get('/home', 'DashboardController@Dashboard')->name('home');
// dashboard
Route::get("/dashboard", "DashboardController@Dashboard");
// user Controlller
Route::get('/admin/fuser', 'UserController@Form');
Route::post('/admin/fuser', 'UserController@Create');
Route::get('/admin/fuser_list', 'UserController@UserList');
Route::post('/admin/get_refarral', 'HomeController@GetRefarral');
Route::get('/admin/fuser/{id}', 'UserController@EditForm');
Route::put('/admin/fuser', 'UserController@Update');
Route::get('/admin/fuser_delete/{id}', 'UserController@Delete');
// package controller
Route::get('/admin/packages', 'PackageController@Form');
Route::post('/admin/packages', 'PackageController@Create');
Route::get('/admin/all_packages', 'PackageController@AllData');
Route::post('/admin/get_packages', 'PackageController@GetPackages');
Route::get('/admin/package_edit/{id}', 'PackageController@EditForm');
Route::put('/admin/package_edit', 'PackageController@Edit');
Route::get('/admin/package_delete/{id}', 'PackageController@Delete');
// comission controller
Route::get('/admin/refarral_comission', 'ComissionController@GetAdminRefComission');
// Balance Controller
Route::get('/admin/balance', 'BalanceController@Form');
Route::post('/admin/balance', 'BalanceController@Create');
Route::get('/admin/balance_all', 'BalanceController@AllData');
Route::get('/admin/balance_edit/{id}', 'BalanceController@EditForm');
// withdraw controller
Route::get('/admin/withdraw_transaction', 'WidthdrawController@AllData');
Route::get('/admin/withdraw_pending', 'WidthdrawController@PendingData');
Route::get('/admin/aprove_withdraw/{id}', 'WidthdrawController@Aprove');
// generation controller
Route::get('/admin/generation', 'GenerationController@Form');
Route::post('/admin/generation', 'GenerationController@Create');

// add Current balance Controller
Route::get('/admin/add_current_balance', 'CurrentBalanceController@Form');
Route::post('/admin/add_current_balance', 'CurrentBalanceController@Create');
// mobile recharge controller
// test controller
Route::get('/test', 'TestController@Test');
// console controller
Route::get('/storage-link', 'ConsoleController@StorageLink');
Route::get('/route-cache', 'ConsoleController@RouteCache');
// Upgrade route
// Route::get("/admin/upgrade","UpgradeController@UpgradeLoop");
Route::get("/admin/upgrade", "UpgradeController@Form");
Route::post("/admin/upgrade", "UpgradeController@Create");
// prouducts
Route::get('/admin/add_product', 'ProductController@Form');
Route::post('/admin/add_product', 'ProductController@Create');
Route::get('/admin/delete/product/{id}', 'ProductController@Delete');
Route::get('/admin/edit/product/{id}', 'ProductController@Edit');
Route::put('/admin/product/update/{id}', 'ProductController@Update')->name('product.update');
Route::get('/admin/product_list', 'ProductController@AllData');
// orphan
Route::get('/admin/orphan', 'OrphanController@Form');
Route::post('/admin/orphan', 'OrphanController@Create');
Route::get('/admin/delete/orphan/{id}', 'OrphanController@Delete');
Route::get('/admin/edit/orphan/{id}', 'OrphanController@Edit');
Route::put('/admin/orphan/update/{id}', 'OrphanController@Update')->name('orphan.update');

Route::get('/admin/orphan_list', 'OrphanController@AllData');
// stockiest
Route::get('/admin/stockiest', 'StockiestController@Form');
Route::post('/admin/stockiest', 'StockiestController@Create');
Route::get('/admin/stockiest_list', 'StockiestController@AllData');

Route::get('/admin/edit/stockiest/{id}', 'StockiestController@Edit');
Route::put('/admin/stockiest/update/{id}', 'StockiestController@Update')->name('stockiest.update');
Route::get('/admin/delete/stockiest/{id}', 'StockiestController@Delete');

Route::get('getUser/{id}', function ($id) {
    $user = Fuser::where('id', $id)->get();
    return json_encode($user);
})->name('getUser');

Route::get('artisan-335198', function () {
    // Artisan::call('optimize:clear');
    // Artisan::call('storage:link');
    Artisan::call('migrate');
    dd(Artisan::output());
});

Route::get('/yearly/sales', 'SalesController@yearlySales')->name('yearly.sales');
Route::get('/monthly/sales', 'SalesController@monthlySales')->name('monthly.sales');
Route::get('/weekly/sales', 'SalesController@weeklySales')->name('weekly.sales');
Route::get('/delete/sales/{id}', 'SalesController@deleteSales')->name('delete.sales');

Route::get('/cron-job', 'DashboardController@cronJob')->name('do.cron.central.bonus.distribute');


// Share Balance 
Route::get('admin/share/add' , 'ShareBalanceController@create')->name('add.share.balance');
Route::POST('store/share/balance' , 'ShareBalanceController@store')->name('store.share.balance');
Route::get('share/balance/list' , 'ShareBalanceController@index')->name('sharebalance.list');
Route::get('send/share/balance' , 'ShareBalanceController@send')->name('send.share.balance');
Route::POST('monthly/share/balance' , 'ShareBalanceController@mothlyadd')->name('mothlyadd.share.balance');
Route::get('share/edit/{id}' , 'ShareBalanceController@edit')->name('share.edit');   
Route::POST('share/update' , 'ShareBalanceController@update')->name('share.update');

// Founder Balance 
Route::get('admin/founder/add' , 'FounderBalanceController@create')->name('add.founder.balance');
Route::POST('admin/founder/store' , 'FounderBalanceController@store')->name('active.founder.balance');
Route::get('founders/list' , 'FounderBalanceController@index')->name('founders.list');
Route::get('send/founder/balance' , 'FounderBalanceController@send')->name('send.founder.balance');
Route::POST('monthly/founders/balance' , 'FounderBalanceController@monthlyadd')->name('mothlyadd.founder.balance');
Route::get('founder/edit/{id}' , 'FounderBalanceController@edit')->name('founder.edit');
Route::POST('founder/update' , 'FounderBalanceController@update')->name('founder.update');
// Route::resource('/admin/setting','SettingController');
});


Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
],function(){
    Route::resource('/admin/setting','SettingController');
});