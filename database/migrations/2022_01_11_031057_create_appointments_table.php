<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('donor_contact');
            $table->datetime('date');
            $table->unsignedBigInteger('donation_type_id')->index()->nullable();
            $table->foreign('donation_type_id')->references('id')->on('donation_types');
            $table->unsignedBigInteger('status_id')->index()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
