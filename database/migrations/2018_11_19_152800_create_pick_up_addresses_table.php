<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickUpAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pick_up_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('pname');
            $table->string('paddress1');
            $table->string('paddress2');
            $table->string('ptown');
            $table->string('pstate');
            $table->string('ppostcode');
            $table->string('pphone');
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
        Schema::dropIfExists('pick_up_addresses');
    }
}
