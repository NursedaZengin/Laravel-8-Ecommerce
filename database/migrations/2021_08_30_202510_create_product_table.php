<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('product_name',100);
            $table->string('slug',160);
            $table->string('image',160)->nullable();
            $table->text('properties')->nullable();
            $table->text('description')->nullable();//text alanda karakter sayısı belirtilmez
            $table->decimal('price',10,2);//2. parametre = toplam bas. sayısı, 3. parametre = ondalık kısmının bas. sayısı
            $table->timestamps();
            $table->softdeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
