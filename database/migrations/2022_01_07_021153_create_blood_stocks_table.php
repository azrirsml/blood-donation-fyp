<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_id')->index()->nullable();
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedBigInteger('hospital_id')->index()->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->unsignedBigInteger('blood_type_id')->index()->nullable();
            $table->foreign('blood_type_id')->references('id')->on('blood_types');
            $table->string('status');
            $table->string('donation_type');
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
        Schema::dropIfExists('blood_stocks');
    }
}
