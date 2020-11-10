<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProductReviewsTable.
 */
class CreateProductReviewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_reviews', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('productId')->unsigned();
            $table->bigInteger('parentId')->unsigned()->nullable();
            $table->string('title');
            $table->smallInteger('rating')->default(0);
            $table->tinyInteger('published')->default(0);
            $table->text('content')->nullable();
            $table->timestamps();

            $table->foreign('userId', 'product_reviews_productId_foreign_key')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('userId', 'product_reviews_parentId_foreign_key')->references('id')->on('product_reviews')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_reviews');
	}
}
