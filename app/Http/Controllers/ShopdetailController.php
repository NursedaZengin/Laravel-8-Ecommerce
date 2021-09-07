<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopdetailController extends Controller
{
  public function index($slug_product)
  {
    $product=Product::whereRaw('deleted_at is null')->whereSlug($slug_product)->firstOrFail();
    return view('shopdetail',compact('product'));
  }
}
