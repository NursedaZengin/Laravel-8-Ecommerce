<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ShopController extends Controller
{
  public function index()
  {
    $products=Products::whereRaw('deleted_at is null')->get();
    $categories=Categories::whereRaw('deleted_at is null')->orderBy('id','desc')->get();
    return view('shop',compact('products','categories'));
  }

  public function shopcategory($category)
  {
    $categories=Categories::whereRaw('deleted_at is null')->orderBy('id','desc')->get();
    $aranan=Categories::whereSlug($category)->first();
    $products=Products::whereRaw('deleted_at is null')->whereCategory_id($aranan->id)->get(); //laravel yapısında where komutundan sonra büyük harfle başlayarak sütun adı yazılabilir
    return view('shop',compact('products','categories'));
  }


}
