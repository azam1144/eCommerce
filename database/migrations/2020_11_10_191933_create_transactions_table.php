<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTransactionsTable.
 */
class CreateTransactionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned()->nullable();
            $table->bigInteger('orderId')->unsigned()->nullable();
            $table->string('code'); // payment id, provided by the payment gateway.
            $table->enum('type', ['Credit', 'Debit'])->default('Debit');
            $table->enum('mode', ['Cash On Delivery', 'Cheque', 'Online'])->default('Cash On Delivery');
            $table->enum('status', ['New', 'Cancelled', 'Failed', 'Pending', 'Declined', 'Rejected', 'Success'])->default('New');
            $table->text('content')->nullable();
            $table->timestamps();

            $table->foreign('userId', 'transactions_userId_foreign_key')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('orderId', 'transactions_orderId_foreign_key')->references('id')->on('orders')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}
}
