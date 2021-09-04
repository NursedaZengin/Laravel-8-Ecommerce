<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Products;

class ProductTableSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Products::create(['name'=>'Laptop 1','category_id'=>7,'slug'=> Str::slug('Laptop 1', '-'),'image'=>'laptop.png','properties'=>'8GB 256GB macOS 13" QHD','description'=>'Taşınabilir Bilgisayar Gümüş','price'=>1973.61]);
        Products::create(['name'=>'Laptop 12','category_id'=>7,'slug'=> Str::slug('Laptop 12', '-'),'image'=>'laptop.png','properties'=>'16GB 125GB macOS 14" QHD','description'=>'Taşınabilir Bilgisayar Siyah','price'=>2329.76]);
        Products::create(['name'=>'Laptop 22','category_id'=>7,'slug'=> Str::slug('Laptop 22', '-'),'image'=>'laptop.png','properties'=>'32GB 256GB macOS 12" QHD','description'=>'Taşınabilir Bilgisayar Beyaz','price'=>2407.27]);
        Products::create(['name'=>'PC 1','category_id'=>6,'slug'=> Str::slug('PC 1', '-'),'image'=>'pc.jpg','properties'=>'16GB Ram 256GB M.2 NVMe 4GB GTX750Ti Freedos 23.8"','description'=>'Curved Oyun Bilgisayarı','price'=>2953.51]);
        Products::create(['name'=>'Phone 2','category_id'=>5,'slug'=> Str::slug('Phone 2', '-'),'image'=>'tel.png','properties'=>'64GB 5.7 inch screen 4GHz Quad Core','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore','price'=>1397.92]);
        Products::create(['name'=>'Phone 31','category_id'=>5,'slug'=> Str::slug('Phone 31', '-'),'image'=>'tel.png','properties'=>'32GB 4.7 inch screen 2GHz Quad Core','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore','price'=>1023.21]);
    }
}
