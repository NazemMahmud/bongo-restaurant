<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            //            "id,""name"",""branch"",""phone"",""email"",""logo"",""address"",""housenumber"",""postcode"",
            //""city"",""latitude"",""longitude"",""url"",
            //""open"",""bestMatch"",""newestScore"",""ratingAverage"",""popularity"",""averageProductPrice"",""deliveryCosts"",""minimumOrderAmount"""
//"98001223,""La Gondolina"","""",""0641079539"",""info@lagondolina.nl"",""/nl/3/logo.png"",""Karperweg"",""3 hs"",""1075LA"",
//""Amsterdam"",52.3486912,4.8570568,""lagondolina"",
//2,
//218,
//1685,
//9,
//91, popularity
//10.93,
//6.57,6.57"
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('branch')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->text('address')->nullable();
            $table->string('housenumber')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('url');
            $table->integer('open');
            $table->integer('bestMatch');
            $table->integer('newestScore');
            $table->double('ratingAverage');
            $table->integer('popularity');
            $table->double('averageProductPrice');
            $table->double('deliveryCosts');
            $table->double('minimumOrderAmount');
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
        Schema::dropIfExists('restaurants');
    }
}
