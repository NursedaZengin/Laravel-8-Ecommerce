<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
