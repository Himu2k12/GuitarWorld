<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country');
            $table->string('artist_name');
            $table->string('artist_pp')->nullable();
            $table->integer('artist_id');
            $table->text('artist_type');
            $table->string('band_name')->nullable();
            $table->string('brand_position')->nullable();
            $table->string('mobile');
            $table->string('fb_link')->nullable();
            $table->string('website')->nullable();
            $table->longText('artist_bio');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('artist_profiles');
    }
}
