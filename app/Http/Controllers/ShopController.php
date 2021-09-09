<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
  public function index()
  {
    $products=Product::whereRaw('deleted_at is null')->get();
    $categories=Category::whereRaw('deleted_at is null')->orderBy('id','desc')->get();


    if (request()->sort == 'low_high') {
            $products = $products->sortBy('price');
        }
         elseif (request()->sort == 'high_low') {
            $products = $products->sortByDesc('price');
        }

    return view('shop',compact('products','categories'));
  }

  public function shopcategory($category)
  {
    $categories=Category::whereRaw('deleted_at is null')->orderBy('id','desc')->get();
    $aranan=Category::whereSlug($category)->first();
    $products=Product::whereRaw('deleted_at is null')->whereCategory_id($aranan->id)->get(); //laravel yapısında where komutundan sonra büyük harfle başlayarak sütun adı yazılabilir
    return view('shop',compact('products','categories'));
  }

  public function detail($slug_product)
  {
    $product=Product::whereRaw('deleted_at is null')->whereSlug($slug_product)->firstOrFail();
    $categories=Category::whereRaw('deleted_at is null')->orderBy('id','desc')->get();
    return view('shopdetail',compact('product','categories'));
  }


}
