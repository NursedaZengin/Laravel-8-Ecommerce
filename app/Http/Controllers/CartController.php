<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\ShoppingCartDetail;

class CartController extends Controller
{
  public function index()
  {
    return view('cart');
  }

  public function store(Request $request)
  {
    Cart::add($request->id,$request->name,1,$request->price)->associate('App\Models\Products');
    return redirect()->route('store')->with([
     'alert-success' => 'Item was added to your cart.',
   ]);
  }

  public function remove($id)
  {
    Cart::remove($id);
    return back()->with('alert-success','Item has been removed.');
  }

}
