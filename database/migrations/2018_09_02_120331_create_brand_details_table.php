<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->char('country',50);
            $table->string('brand_image');
            $table->string('position');
            $table->integer('mobile');
            $table->string('work_address');
            $table->longText('brand_description');
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
        Schema::dropIfExists('brand_details');
    }
}
