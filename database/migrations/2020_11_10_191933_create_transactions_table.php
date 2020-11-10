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
            $table->string('code');
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('mode')->default(0);
            $table->tinyInteger('status')->default(0);
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
