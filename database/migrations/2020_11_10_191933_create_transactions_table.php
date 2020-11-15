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
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->enum('mode', ['Cash On Delivery', 'Cheque', 'Online'])->default('Cash On Delivery');
            $table->string('response')->nullable();
            $table->string('response_code')->nullable();
            $table->float('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('pt_invoice_id')->nullable();
            $table->string('reference_no')->nullable();
            $table->string('transaction_id');
            $table->timestamps();

            $table->foreign('user_id', 'transactions_userId_foreign_key')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id', 'transactions_orderId_foreign_key')->references('id')->on('orders')->onDelete('cascade');
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
