<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicePaymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_payment_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('payment_amount');
            $table->text('service_id');
            $table->text('user_id');
            $table->text('name_on_card');
            $table->text('card_number');
            $table->integer('month');
            $table->integer('year');
            $table->integer('cvv_number');
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
        Schema::dropIfExists('service_payment_infos');
    }
}
