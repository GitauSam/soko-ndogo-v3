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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->string('order_name');
            $table->unsignedBigInteger('order_category');
            $table->foreign('order_category')->references('id')->on('categories');
            $table->string('quantity');
            $table->string('quantity_unit');
            $table->unsignedBigInteger('order_category_type_id')->nullable();
            $table->foreign('order_category_type_id')->references('id')->on('category_types');
            $table->boolean('serviced')->default(FALSE);
            $table->string('remainder')->default("100%");
            $table->timestamps();
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
