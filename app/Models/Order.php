<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'shoppingCart_id',
        'total',
        'status',
        'name',
        'address',
        'phone',
    ];

    public function shoppingCart()//shoppingCart tablosu ile ilişki kurar
  {
    return $this->belongsTo('App\Models\ShoppingCart');
  }

  public function user()//user tablosu ile ilişki kurar
  {
    return $this->belongsTo('App\Models\User');
  }
}
