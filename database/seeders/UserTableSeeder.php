<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('users')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
      User::create(['name'=>'Nurseda Zengin','email'=>'nurseda@gmail.com','password'=>bcrypt('1234')]); //model ile veri eklenirse timestamp alanları otomatik dolar
    }
}
