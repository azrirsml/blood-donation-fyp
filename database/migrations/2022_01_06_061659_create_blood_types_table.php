<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $bloodType = [
            ['id' => 1, 'name' => 'A+'],
            ['id' => 2, 'name' => 'A-'],
            ['id' => 3, 'name' => 'B+'],
            ['id' => 4, 'name' => 'B-'],
            ['id' => 5, 'name' => 'AB+'],
            ['id' => 6, 'name' => 'AB-'],
            ['id' => 7, 'name' => 'O+'],
            ['id' => 8, 'name' => 'O-'],
        ];
        
        \DB::table('blood_types')->insert($bloodType);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_types');
    }
}
