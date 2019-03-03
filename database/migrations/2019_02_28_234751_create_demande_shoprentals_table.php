<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandeShoprentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandeshoprentals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('artisan_id');
            $table->integer('section_id')->unsigned();
            $table->integer('shoprental_id')->unsigned();
            $table->longText('artisan_email',700);
            $table->string('status',50);
            $table->foreign('artisan_id')->references('numero_artisant')->on('artisans')->onDelete('cascade');
            $table->foreign('shoprental_id')->references('id')->on('shoprentals')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
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
        Schema::dropIfExists('demande_shoprentals');
    }
}
