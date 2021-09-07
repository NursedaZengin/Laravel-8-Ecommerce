<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function qtyPlus($rowId)
    {
      $product=Cart::get($rowId);
      dd($rowId);
      $qty=$product->qty+1;
      Cart::update($rowId,$qty);
    }

   public function user()//user tablosu ile ilişki kurar
   {
     return $this->belongsTo('App\Models\User');
   }

   public function product()
   {
         return $this->belongsToMany('App\Models\Product');
   }



}
