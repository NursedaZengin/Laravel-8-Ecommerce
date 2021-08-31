<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    public $timestamps  = false;//tarih alanlarını kullanmayacağımızı bildirir

    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'city',
        'province',
        'postacode',
    ];

   public function user()//User ile ilişki kurar
   {
     return $this->belongsTo('App\Models\User');
   }
}
