<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
        });

        $hospitals = [
            ['id' => 1, 'name' => 'Hospital Sultanah Aminah'],
            ['id' => 2, 'name' => 'Sultanah Bahiyah Hospital'],
            ['id' => 3, 'name' => 'Hospital Raja Perempuan Zainab II'],
            ['id' => 4, 'name' => 'Hospital Canselor Tuanku Muhriz UKM (HCTM)'],
            ['id' => 5, 'name' => 'Hospital Nukleus Labuan'],
            ['id' => 6, 'name' => 'Hospital Alor Gajah'],
            ['id' => 7, 'name' => 'Tuanku Jaafar Hospital'],
            ['id' => 8, 'name' => 'Tengku Ampuan Afzan Hospital'],
            ['id' => 9, 'name' => 'Penang General Hospital'],
            ['id' => 10, 'name' => 'Hospital Batu Gajah'],
            ['id' => 11, 'name' => 'Hospital Tuanku Fauziah'],
            ['id' => 12, 'name' => 'Putrajaya Hospital'],
            ['id' => 13, 'name' => 'Queen Elizabeth Hospital, Kota Kinabalu (I & II)'],
            ['id' => 14, 'name' => 'Sarawak General Hospital'],
            ['id' => 15, 'name' => 'Hospital Shah Alam'],
            ['id' => 16, 'name' => 'Hospital Sultanah Nur Zahirah, Kuala Terengganu'],
        ];

        \DB::table('hospitals')->insert($hospitals);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitals');
    }
}
