<?php

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
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath',]
], function(){ 
	
	Auth::routes();
	
	Route::group(['middleware' =>  'MobileVerified'],function(){
		
		Route::group(['namespace' => 'front','middleware' => 'auth'],function(){
			Route::get('profile',function(){
				return 'hello from profile';
			});
		}); 
	});
	
	Route::group(['middleware' => 'auth'],function(){
		
			//route for verify mobile code 
			Route::get('mobile_verify',function(){
				return view('auth.mobile_verify');
			})->name('mobile.verify.form'); 
	
			Route::post('mobile_code_verify',[App\Http\Controllers\Auth\MobileVerification::class,'verify'])->name('mobile.verify');
			
			/////////////////////wishlist
			Route::post('wishlist/store',[App\Http\Controllers\Front\WishlistController::class,'store'])->name('wishlist.store');
			Route::get('wishlist',[App\Http\Controllers\Front\WishlistController::class, 'index'])->name('wishlist.products.index');
			Route::delete('wishlist/destroy',[App\Http\Controllers\Front\WishlistController::class,'destroy'])->name('wishlist.destroy');
			
			///////////////cart
			Route::group(['prefix' => 'cart'], function(){
				Route::get('/',[App\Http\Controllers\Front\CartController::class, 'index'])->name('front.cart.index');
				Route::post('/add',[App\Http\Controllers\Front\CartController::class, 'add'])->name('front.cart.add');				
				Route::post('/update',[App\Http\Controllers\Front\CartController::class, 'update'])->name('front.cart.update');
			//////////////end cart
			//////payment
				Route::get('/payment/{total}',[App\Http\Controllers\Front\PaymentController::class,'index'])->name('payment.index');
				Route::post('/payment',[App\Http\Controllers\Front\PaymentController::class,'process'])->name('payment.process');
			});
			 
	}); 
	
	Route::get('/',[App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
	
	Route::get('category/{slug}',[App\Http\Controllers\Front\CategoryController::class,'index'])->name('category');
	Route::get('product/{slug}',[App\Http\Controllers\Front\ProductController::class,'index'])->name('product.details'); 
	
	

});

