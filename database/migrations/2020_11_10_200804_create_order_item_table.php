<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('productId')->unsigned();
            $table->bigInteger('orderId')->unsigned();
            $table->string('sku'); //Stock Keeping Unit - a unique id of product while purchasing it.
            $table->float('price')->default(0.0);
            $table->float('discount')->default(0.0);
            $table->smallInteger('quantity')->default(0);
            $table->text('content')->nullable();
            $table->timestamps();

            $table->foreign('productId', 'order_item_productId_foreign_key')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('orderId', 'order_item_orderId_foreign_key')->references('id')->on('orders')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item');
    }
}