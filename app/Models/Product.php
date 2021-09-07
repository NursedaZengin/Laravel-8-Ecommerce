<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'properties',
        'description',
        'price',
        'image',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function category() // category tablosu ile ilişki kurar
     {
         return $this->belongsToMany('App\Models\Category');
     }
}
