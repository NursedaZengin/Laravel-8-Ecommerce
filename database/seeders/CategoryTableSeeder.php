<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('categories')->truncate();//tablonun içini boşaltır
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
      DB::table('categories')->insert(['title'=>'Appliances','slug'=>Str::slug('Appliances', '-'),'created_at'=> now()]);
      DB::table('categories')->insert(['title'=>'Digital Cameras','slug'=>Str::slug('Digital Cameras', '-'),'created_at'=> now()]);
      DB::table('categories')->insert(['title'=>'Tvs','slug'=>Str::slug('Tvs', '-'),'created_at'=> now()]);
      DB::table('categories')->insert(['title'=>'Tablets','slug'=>Str::slug('Tablets', '-'),'created_at'=> now()]);
      DB::table('categories')->insert(['title'=>'Mobile Phones','slug'=>Str::slug('Mobile Phones', '-'),'created_at'=> now()]);
      DB::table('categories')->insert(['title'=>'Desktops','slug'=>Str::slug('Desktops', '-'),'created_at'=> now()]);
      DB::table('categories')->insert(['title'=>'Laptops','slug'=>Str::slug('Laptops', '-'),'created_at'=> now()]);
    }
}
