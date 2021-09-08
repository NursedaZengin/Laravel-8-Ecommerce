<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
      $order['status'] = 'Order has been received.';
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

  public function myorder()
  {
    $orders = ShoppingCart::whereRaw('deleted_at is null')->orderBy('id','desc')->firstOrFail();//sipariş
    $orderproducts=ShoppingCartDetail::whereRaw('deleted_at is null')->where('shoppingCart_id','=',$orders->id)->get();//siparişteki ürün id si ve miktarı
    $orderquantity=$orderproducts->sum('quantity');//siparişteki ürün sayısı
    $products=Product::whereRaw('deleted_at is null')->get();
    return view('myorder',compact('orders','products','orderquantity','orderproducts'));
  }

  public function myorders()
  {
    $user=auth()->user();
    $orders = ShoppingCart::whereRaw('deleted_at is null')->where('user_id','=',$user->id)->orderBy('id','desc')->get();//giriş yapan kullanıcının siparişleri
    return view('myorder',compact('orders'));
  }

  public function myorderdetail($id)
  {
    $order = ShoppingCart::whereRaw('deleted_at is null')->where('id','=',$id)->firstOrFail();//gelen idye ait sipariş
    $orderdetail=ShoppingCartDetail::whereRaw('deleted_at is null')->where('shoppingCart_id','=',$order->id)->get();//gelen siparişin detayı
    $orderquantity=$orderdetail->sum('quantity');//siparişteki ürün sayısı
    $products=Product::whereRaw('deleted_at is null')->get();
    return view('myorderdetail',compact('order','products','orderquantity','orderdetail'));
  }

}
