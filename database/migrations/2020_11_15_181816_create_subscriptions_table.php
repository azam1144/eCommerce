<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSubscriptionsTable.
 */
class CreateSubscriptionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscriptions', function(Blueprint $table) {
            $table->id();
            $table->string('plan');
            $table->float('plan_price')->default(0.0);
            $table->string('interest')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id', 'subscriptions_user_id_foreign_key')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id', 'subscriptions_order_id_foreign_key')->references('id')->on('orders')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subscriptions');
	}
}
