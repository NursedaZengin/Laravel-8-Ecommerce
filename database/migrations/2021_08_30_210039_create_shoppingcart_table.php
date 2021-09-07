<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppingCart', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('set null');
            $table->string('email');
            $table->string('status',30)->nullable();
            $table->string('name',60);
            $table->string('address',200)->nullable();
            $table->string('city',200)->nullable();
            $table->string('province',200)->nullable();
            $table->string('postacode',5)->nullable();
            $table->string('phone',15)->nullable();
            $table->decimal('subtotal',10,2);
            $table->decimal('total',10,2);
            $table->decimal('tax',10,2);
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
        Schema::dropIfExists('shoppingCart');
    }
}
