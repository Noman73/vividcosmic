<?php

use App\Fuser;
use Illuminate\Support\Facades\Route;


Route::group([
    'namespace' => 'App\Http\Controllers',
],function(){

Route::get('/user/dashboard', 'Frontuser\DashboardController@Dashboard');
Route::get('/user/login', 'Frontuser\LoginController@showLoginForm');
Route::post('/user/login', 'Frontuser\LoginController@login');
// home
Route::get('/user/home', 'Frontuser\DashboardController@Dashboard');
// profile controller
Route::get('/user/profile', 'Frontuser\ProfileController@Profile');
Route::get('/user/user_update', 'Frontuser\UserController@UpdateForm');
Route::put('/user/user_update', 'Frontuser\UserController@Update');
// widthdraw controller
//Withdraw Controller
Route::get('/user/withdraw', 'Frontuser\WidthdrawController@Form');
Route::post('/user/withdraw', 'Frontuser\WidthdrawController@Create');
Route::get('/user/withdraw_list', 'Frontuser\WidthdrawController@AllData');
// tree controller
Route::get('/user/tree/{id}', 'Frontuser\GenerationTreeController@Tree');
// refarral controller
Route::get('/user/add_ref_to_balance', 'Frontuser\RefarralController@AddRefIncomeToBalance');
// generation
Route::get('/user/get_generation', 'GenerationController@GetGeneration');
Route::get('/user/generation_add_balance', 'Frontuser\GenerationController@AddToBalance');
Route::get('/user/generation_table', 'Frontuser\GenerationController@ShowTable');
// daily Work;
Route::get('/user/daily_work_add_balance', 'Frontuser\DailyWorkController@AddToBalance');
// User Controller
Route::get('/user/user', 'Frontuser\UserController@Form');
Route::post('/user/user', 'Frontuser\UserController@Create');

// get packages
Route::post('/user/get_packages', 'HomeController@GetPackages');
// refarral id
Route::get('/user/referrals', 'Frontuser\RefarralController@GetMyRefarral');
Route::post('/user/get_referrals_without', 'Frontuser\HomeController@GetRefWithoutMe');
// mobile recharge controller
Route::get('/user/mobile_recharge', 'Frontuser\MobileRechargeController@Form');

// transfer balance
// money transfer
Route::get('/user/transfer', 'Frontuser\BalanceTransferController@Form');
Route::post('/user/transfer', 'Frontuser\BalanceTransferController@Create');
Route::get('/user/transfer_list', 'Frontuser\BalanceTransferController@AllData');
// e-balance transfer
Route::get('/user/etransfer', 'Frontuser\EtransferController@Form');
Route::post('/user/etransfer', 'Frontuser\EtransferController@Create');
Route::get('/user/etransfer_list', 'Frontuser\EtransferController@AllData');
// invoice controller
Route::get('user/invoice', 'Frontuser\InvoiceController@Form');
Route::post('user/invoice', 'Frontuser\InvoiceController@Create');
Route::get('user/invoice_list', 'Frontuser\InvoiceController@InvoiceList');
// get name from fuser
Route::get('user/fuser_name/{id}', "Frontuser\UserController@GetName");
// e to others d transfer
Route::get('user/others_transfer', "Frontuser\OthersTransferController@Form");
Route::post('user/others_transfer', "Frontuser\OthersTransferController@Create");
Route::get('user/others_transfer_list', "Frontuser\OthersTransferController@AllData");
// orphan
Route::get('user/orphan_list', "Frontuser\OrphanController@AllData");
Route::get('user/stockiest_list', "Frontuser\StockiestController@AllData");
// password reset
Route::get('/user/password_reset', 'Frontuser\ChangePasswordController@Form');
Route::post('/user/password_reset', 'Frontuser\ChangePasswordController@Reset');


// Share Balance  Transfer 
Route::get('share/transfer' , 'Frontuser\ShareTransferController@create')->name('share.transfer');
Route::POST('store/share/transfer' , 'Frontuser\ShareTransferController@store')->name('store.share.transfer');
Route::get('list/share/transfer' , 'Frontuser\ShareTransferController@list')->name('list.share.transfer');
// Foundet Balance Transfer 
Route::get('founder/balance/transfer' , 'Frontuser\FounderBalanceTransferController@create')->name('founder.balance.transfer');
Route::POST('founder/transfer/balance' , 'Frontuser\FounderBalanceTransferController@store')->name('founder.transfer.balance');
Route::get('list/founder/transfer' , 'Frontuser\FounderBalanceTransferController@list')->name('list.founder.transfer');

Route::get('get_user/{id}',function($id){
    $fuser= Fuser::find($id)->get();
    return json_encode($fuser);
})->name('get_user');


});