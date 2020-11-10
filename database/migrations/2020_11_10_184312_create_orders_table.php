<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOrdersTable.
 */
class CreateOrdersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
     *
    `shipping` FLOAT NOT NULL DEFAULT 0,
    `firstName` VARCHAR(50) NULL DEFAULT NULL,
    `middleName` VARCHAR(50) NULL DEFAULT NULL,
    `lastName` VARCHAR(50) NULL DEFAULT NULL,
    `mobile` VARCHAR(15) NULL,
    `email` VARCHAR(50) NULL,
    `line1` VARCHAR(50) NULL DEFAULT NULL,
    `line2` VARCHAR(50) NULL DEFAULT NULL,
    `city` VARCHAR(50) NULL DEFAULT NULL,
    `province` VARCHAR(50) NULL DEFAULT NULL,
    `country` VARCHAR(50) NULL DEFAULT NULL,
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned()->nullable();
            $table->string('firstName');
            $table->string('middleName');
            $table->bigInteger('userId');
            $table->string('sessionId');
            $table->string('token');
            $table->tinyInteger('status')->default(0);
            $table->float('total');
            $table->float('subTotal');
            $table->float('discount');
            $table->float('itemDiscount');
            $table->float('tax');
            $table->float('grandTotal');
            $table->string('promo')->nullable();
            $table->text('content')->nullable();


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
		Schema::drop('orders');
	}
}
