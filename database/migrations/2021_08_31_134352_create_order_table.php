<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shoppingcart_id')->constrained('shoppingCart')->onDelete('cascade')->unique()->unsigned();
            $table->decimal('total',10,2);
            $table->string('status',30)->nullable();
            $table->string('name',60);
            $table->string('address',200)->nullable();
            $table->string('phone',15)->nullable();
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
        Schema::dropIfExists('order');
    }
}
