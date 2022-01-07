<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_camps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_id')->index()->nullable();
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedBigInteger('hospital_id')->index()->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->string('venue');
            $table->string('email');
            $table->string('contact');
            $table->datetime('date');
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
        Schema::dropIfExists('blood_camps');
    }
}
