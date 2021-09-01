<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingCart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function order()//order tablosu ile ilişki kurar
   {
     return $this->hasOne('App\Models\Order');
   }

   public function shoppingCartDetail()//ShoppingCartDetail tablosu ile ilişki kurar
   {
     return $this->hasMany('App\Models\ShoppingCartDetail');
   }

   public function user()//user tablosu ile ilişki kurar
   {
     return $this->belongsTo('App\Models\User');
   }
}
