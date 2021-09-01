<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ShopdetailController extends Controller
{
  public function index($slug_product)
  {
    $product=Products::whereRaw('deleted_at is null')->whereSlug($slug_product)->firstOrFail();
    return view('shopdetail',compact('product'));
  }
}
