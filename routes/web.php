<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Front\AuthController as FrontAuthController;
use App\Http\Controllers\Front\HomeController;

use App\Http\Controllers\Admin\DashboardController;
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
Route::group(['middleware' => 'guest'], function () 
{
	Route::group(['prefix'=>'admin'], function () 
	{
		Route::get('', [AuthController::class, 'index']);
		Route::post('/login',    [AuthController::class, 'login'])->name('login');
	});
});

Route::group(['middleware' => 'auth.basic'], function () 
{
	Route::group(['prefix'=>'admin'], function () 
	{
		Route::get('/logout',    [AuthController::class, 'logout'])->name('logout'); 
		Route::get('/dashboard', [DashboardController::class, 'index']);
	});
	
});

Route::group(['middleware' => 'userguest'], function ()
{
	Route::any('login', 		  		 [FrontAuthController::class, 'login']);

});

Route::group(['middleware' => 'user'], function ()
{
	Route::get('/logout',    		   [FrontAuthController::class, 'logout']); 
	Route::get('/start_break_time',    [HomeController::class, 'StartBreakTime']); 
	Route::get('/end_break_time',      [HomeController::class, 'EndBreakTime']); 

});

Route::get('/',    		   [HomeController::class, 'index']); 


