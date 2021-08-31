<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'category_id',
        'product_name',
        'slug',
        'properties',
        'description',
        'price',
        'image',
    ];

    public function detail()//ProductDetail modeli ile ilişki kurar
    {
      return $this->hasOne('App\Models\ProductDetail')->withDefault();
    }
}
