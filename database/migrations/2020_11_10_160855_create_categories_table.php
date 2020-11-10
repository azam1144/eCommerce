<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCategoriesTable.
 */
class CreateCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('parentId')->unsigned();
            $table->string('title');
            $table->string('metaTitle')->nullable();
            $table->string('slug');
            $table->string('content')->nullable();
            $table->timestamps();

            
            $table->foreign('parentId', 'categories_parentId_foreign_key')->references('id')->on('categories')->onDelete('cascade');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}
}
