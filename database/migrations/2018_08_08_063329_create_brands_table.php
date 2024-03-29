<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand_name');
            $table->string('brand_specification');
            $table->string('brand_image');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
