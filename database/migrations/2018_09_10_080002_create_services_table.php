<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('customer_id');
            $table->string('Services');
            $table->string('brand_name');
            $table->text('product_name');
            $table->string('user_period');
            $table->string('product_model');
            $table->integer('prepare_time')->nullable();
            $table->text('short_description');
            $table->text('notes')->nullable();
            $table->string('product_image');
            $table->string('total_cost')->nullable();
            $table->tinyInteger('accept')->nullable();
            $table->tinyInteger('declined')->nullable();
            $table->string('status');
            $table->date('delivery_date')->nullable();
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
        Schema::dropIfExists('services');
    }
}
