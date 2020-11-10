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
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned()->nullable();
            $table->string('sessionId');
            $table->string('token');
            $table->smallInteger('status')->default(0);
            $table->float('total');
            $table->float('subTotal');
            $table->float('discount');
            $table->float('itemDiscount');
            $table->float('tax');
            $table->float('grandTotal');
            $table->string('promo')->nullable();
            $table->text('content')->nullable();


            $table->float('shipping');
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();

            $table->foreign('userId', 'orders_userId_foreign_key')->references('id')->on('users')->onDelete('cascade');
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
