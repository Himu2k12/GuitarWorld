<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_withdraws', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->float('amount_of_withdraw',10,2);
            $table->float('commission',10,2);
            $table->tinyInteger('Purchase')->default(0);
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
        Schema::dropIfExists('dealer_withdraws');
    }
}
