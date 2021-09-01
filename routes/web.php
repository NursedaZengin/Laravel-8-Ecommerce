<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopdetailController;
use App\Http\Controllers\CheckoutController;

Route::get("/",[HomeController::class,'index'])->name('index');
Route::get("/shop",[ShopController::class,'index'])->name('shop');
Route::get("/{category}",[ShopController::class,'shopcategory'])->name('shopcategory');
Route::get("/shopdetail/{slug_product}",[ShopDetailController::class,'index'])->name('shopdetail');
Route::get("/login",[LoginController::class,'index'])->name('login');
Route::post("/authenticate",[LoginController::class,'authenticate'])->name('authenticate');
Route::get("/cart",[CartController::class,'index'])->name('cart');
Route::get("/checkout",[CheckoutController::class,'index'])->name('checkout');
