<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingCartDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'shoppingCart_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function product()//products tablosu ile ilişki kurar
    {
    	return $this->belongsTo('App\Models\Products');
    }
}
