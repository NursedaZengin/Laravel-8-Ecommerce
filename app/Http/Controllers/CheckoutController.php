<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartDetail;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
  public function index()
  {
      if (auth()->user() && request()->is('guestCheckout'))
      {
             return redirect()->route('checkout');
      }
      return view('checkout');
  }

  public function order(Request $request)
  {
    try{
    // Insert into ShoppingCart table
      $order = request()->all();//istekten gelen tüm siparişi alır
      $order['user_id'] =auth()->user() ? auth()->user()->id : null;
      $order['email'] = $request->email;
      $order['status'] = 'Sipariş alındı.';
      $order['name'] = $request->name;
      $order['address'] =$request->address;
      $order['city'] = $request->city;
      $order['province'] = $request->province;
      $order['postacode'] = $request->postacode;
      $order['phone'] =$request->phone;
      $order['subtotal'] =Cart::subtotal(2,'.','');
      $order['tax'] =Cart::tax(2,'.','');
      $order['total'] =Cart::total(2,'.','');

      $savedOrder=ShoppingCart::create($order); //verileri kaydeder ve değişkene atar

        // Insert into shoppingCartDetail table
      if(isset($savedOrder->id))
      {
        foreach (Cart::content() as $item) {
            ShoppingCartDetail::create([
                'shoppingCart_id' =>$savedOrder->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }
      }
      Cart::destroy();//sessionı siler
    }
    catch (Throwable $e) {
        return redirect()->route('orderdetail')->with('alert-danger', 'Hata:');
    }
      return redirect()->route('orderdetail')->with([
       'alert-success' => 'Your order has been received.',
     ]);
  }

  public function orderdetail()
  {
    return view('order');
  }

}
