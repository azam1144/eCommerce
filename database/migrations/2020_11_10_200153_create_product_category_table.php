<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('productId')->unsigned();
            $table->bigInteger('categoryId')->unsigned();
            $table->timestamps();

            $table->foreign('productId', 'product_category_productId_foreign_key')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('categoryId', 'product_category_categoryId_foreign_key')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category');
    }
}
