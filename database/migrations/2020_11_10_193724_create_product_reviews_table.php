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
            $table->string('title'); //The review title.
            $table->smallInteger('rating')->default(0); //The review rating.
            $table->boolean('published')->default(0); // to identify whether the review is publicly available.
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
