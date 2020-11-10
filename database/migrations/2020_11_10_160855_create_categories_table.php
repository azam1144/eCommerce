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
            $table->id();
            $table->bigInteger('parentId')->unsigned()->nullable();
            $table->string('title');
            $table->string('metaTitle')->nullable();
            $table->string('slug');
            $table->text('content')->nullable();
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
