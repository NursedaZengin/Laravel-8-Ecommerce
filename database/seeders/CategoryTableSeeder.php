<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Categories;

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
      Categories::create(['title'=>'Appliances','slug'=>Str::slug('Appliances', '-')]);
      Categories::create(['title'=>'Digital Cameras','slug'=>Str::slug('Digital Cameras', '-')]);
      Categories::create(['title'=>'Tvs','slug'=>Str::slug('Tvs', '-')]);
      Categories::create(['title'=>'Tablets','slug'=>Str::slug('Tablets', '-')]);
      Categories::create(['title'=>'Mobile Phones','slug'=>Str::slug('Mobile Phones', '-')]);
      Categories::create(['title'=>'Desktops','slug'=>Str::slug('Desktops', '-')]);
      Categories::create(['title'=>'Laptops','slug'=>Str::slug('Laptops', '-')]);
    }
}
