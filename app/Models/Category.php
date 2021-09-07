<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'title',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function product() //Product tablosu ile ilişki kurar
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
