<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;

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
      Category::create(['title'=>'Appliances','slug'=>Str::slug('Appliances', '-')]);
      Category::create(['title'=>'Digital Cameras','slug'=>Str::slug('Digital Cameras', '-')]);
      Category::create(['title'=>'Tvs','slug'=>Str::slug('Tvs', '-')]);
      Category::create(['title'=>'Tablets','slug'=>Str::slug('Tablets', '-')]);
      Category::create(['title'=>'Mobile Phones','slug'=>Str::slug('Mobile Phones', '-')]);
      Category::create(['title'=>'Desktops','slug'=>Str::slug('Desktops', '-')]);
      Category::create(['title'=>'Laptops','slug'=>Str::slug('Laptops', '-')]);
    }
}
