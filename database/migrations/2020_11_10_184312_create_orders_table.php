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
            $table->string('sessionId'); //The unique session id associated with the order.
            $table->string('token'); //The unique token associated with the order to identify it over multiple sessions.
            $table->enum('status', ['New', 'Checkout', 'Paid', 'Failed', 'Shipped', 'Delivered', 'Returned', 'Complete'])->default('New');
            $table->float('total')->default(0.0);
            $table->float('subTotal')->default(0.0);
            $table->float('discount')->default(0.0);
            $table->float('itemDiscount')->default(0.0);
            $table->float('tax')->default(0.0); // tax on the Order Items.
            $table->float('grandTotal')->default(0.0); //The grand total of the order to be paid by the buyer.
            $table->string('promo')->nullable(); //promo code with the Order.
            $table->text('content')->nullable();


            $table->float('shipping')->default(0.0); //shipping charges
            $table->string('firstName')->nullable(); //first name of the user.
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
