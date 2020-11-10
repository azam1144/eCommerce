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
            $table->bigInteger('userId')->unsigned()->nullable();
            $table->string('title');
            $table->string('metaTitle')->nullable();
            $table->string('slug');
            $table->text('summary')->nullable();
            $table->smallInteger('type')->default(0);
            $table->string('sku');
            $table->float('price')->default(0);
            $table->float('discount')->default(0);
            $table->smallInteger('quantity')->default(0);
            $table->tinyInteger('shop')->default(0);
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
