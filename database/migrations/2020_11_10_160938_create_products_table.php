<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProductsTable.
 */
class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
     *
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned()->nullable(); //The user id to identify the admin or vendor.
            $table->string('title');
            $table->string('metaTitle')->nullable(); //meta title to be used for browser title.
            $table->string('slug'); //slug to form the URL.
            $table->text('summary')->nullable(); //The summary to mention the key highlights.
            $table->string('sku'); // Stock Keeping Unit - a unique id to rack product in store.
            $table->float('price')->default(0.0);
            $table->float('discount')->default(0.0);
            $table->smallInteger('quantity')->default(0);
            $table->text('content')->nullable();
            $table->timestamps();

            $table->foreign('userId', 'products_userId_foreign_key')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}
}
