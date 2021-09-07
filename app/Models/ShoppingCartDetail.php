<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingCartDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'shoppingCartDetail';

    protected $fillable = [
        'shoppingCart_id',
        'product_id',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];



}
