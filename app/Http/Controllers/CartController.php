<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
  public function index()
  {
    return view('cart');
  }

  public function update($id)
  {
    Cart::update($id,request('adet'));
    session()->flash('alert-success' , 'Item was updated to your cart.');
    return response()->json(['success'=>true]);
  }

  public function store(Request $request)
  {
    //istekten gelen ürün cart a eklenmiş mi
    $selected_product=Cart::search( function($cartitem,$rowId) use ($request)
    {
      return $cartitem->id===$request->id;
    });

    if($selected_product->isNotEmpty())
    {
        return redirect()->route('cart')->with('alert-info','Item is already  in your cart.');
    }
    Cart::add($request->id,$request->name,1,$request->price)
      ->associate('App\Models\Product');
    return redirect()->route('store')->with([
     'alert-success' => 'Item was added to your cart.',
   ]);
  }

  public function remove($id)
  {
    Cart::remove($id);
    return back()->with('alert-success','Item has been removed.');
  }

  public function SaveFLater($id)
  {
    $item=Cart::get($id);//gelen ürün seçilir
    Cart::remove($id);//carttan ürün silinir

    //istekten gelen ürün saveforlatter a eklenmiş mi
    $selected_product=Cart::instance('saveForLater')->search( function($cartitem,$rowId) use ($id)
    {
      return $rowId===$id;
    });

    if($selected_product->isNotEmpty())
    {
        return redirect()->route('cart')->with('alert-success','Item is already  Save For Latter.');
    }
    Cart::instance('saveForLater')->add($item->id, $item->name,1,$item->price)
      ->associate('App\Models\Product');
    return redirect()->route('cart')->with('alert-success','Item has been Save For Later.');
  }

  public function moveToCartDelete($id)
    {
      Cart::instance('saveForLater')->remove($id);
      return back()->with('alert-success','Item has been removed.');
    }

    public function moveToCart($id)
     {
         $item = Cart::instance('saveForLater')->get($id); //savefotlatter isteğinden gelen id seçilir
         Cart::instance('saveForLater')->remove($id);//saveforlatterdan bu id silinir

         $selected_product = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) { //gelen ürün default isteğe eklenir
             return $rowId === $id;
         });

         if ($selected_product->isNotEmpty()) { //eğer ürün istekte varsa
             return redirect()->route('cart')->with('alert-success', 'Item is already in your Cart!');
         }
         Cart::instance('default')->add($item->id, $item->name, 1, $item->price)//yoksa ürünü ekler
             ->associate('App\Models\Product');

         return redirect()->route('cart')->with('alert-success', 'Item has been moved to Cart!');
     }


}
