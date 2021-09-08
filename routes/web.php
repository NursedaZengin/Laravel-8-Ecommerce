<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopdetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;

//home
Route::get("/",[HomeController::class,'index'])->name('index');

Route::get("/about",[HomeController::class,'about'])->name('about');

Route::get("/blog",[HomeController::class,'blog'])->name('blog');


//shopping
Route::group(['prefix'=>'shop'],function(){
  Route::get('/',[ShopController::class,'index'])->name('shop');
  Route::get('/{category}',[ShopController::class,'shopcategory'])->name('shopcategory');
  Route::get("/detail/{slug_product}",[ShopController::class,'detail'])->name('shopdetail');
});

//Route::get("/shopdetail/{slug_product}",[ShopDetailController::class,'index'])->name('shopdetail');

//login
Route::get("/login",[LoginController::class,'index'])->name('login');
Route::post("/authenticate",[LoginController::class,'authenticate'])->name('authenticate');
Route::get("/logout",[LoginController::class,'logout'])->name('logout');
Route::get("/signup",[RegisterController::class,'index'])->name('signup');
Route::post("/signup",[RegisterController::class,'signup'])->name('signup');

//guest check
Route::get("/checkout",[CheckoutController::class,'index'])->name('checkout')->middleware('auth');
Route::get("/guestcheckout",[CheckoutController::class,'index'])->name('guestCheckOut');
Route::post("/checkout",[CheckoutController::class,'order'])->name('order');
Route::get("/order",[CheckoutController::class,'orderdetail'])->name('orderdetail');
Route::get("/myorder",[CheckoutController::class,'myorder'])->name('myorder');
Route::get("/myorders",[CheckoutController::class,'myorders'])->name('myorders')->middleware('auth');
Route::get("/myorderdetail/{id}",[CheckoutController::class,'myorderdetail'])->name('myorderdetail')->middleware('auth');

//cart - sepet
Route::group(['prefix'=>'cart'],function(){
  Route::get("/",[CartController::class,'index'])->name('cart');
  Route::post("/",[CartController::class,'store'])->name('store');
  Route::delete("/{id}",[CartController::class,'remove'])->name('remove');
  Route::post("/SaveFLater/{product}",[CartController::class,'SaveFLater'])->name('SaveFLater');
  Route::patch("/update/{id}",[CartController::class,'update'])->name('update'); //quantity update
  Route::post("/moveToCart/{id}",[CartController::class,'moveToCart'])->name('moveToCart');
  Route::delete("/moveToCartDelete/{id}",[CartController::class,'moveToCartDelete'])->name('moveToCartDelete');
});
