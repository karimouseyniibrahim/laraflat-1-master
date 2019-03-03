<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('numero_artisan',200);            
            $table->string('name',250);
            $table->longText('email');
            $table->string('adresse',250)->nullable();
            $table->string('telephone',20)->nullable();            
            $table->string('status',25)->nullable();
            $table->integer('formations_id')->unsigned();
            $table->foreign('formations_id')->references('id')->on('formations')->onDelete('cascade');
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
        Schema::dropIfExists('inscriptions');
    }
}
