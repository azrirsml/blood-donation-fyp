<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $states = [
            ['id' => 1, 'name' => 'Selangor'],
            ['id' => 2, 'name' => 'Kuala Lumpur'],
            ['id' => 3, 'name' => 'Pulau Pinang'],
            ['id' => 4, 'name' => 'Johor'],
            ['id' => 5, 'name' => 'Melaka'],
            ['id' => 6, 'name' => 'Perak'],
            ['id' => 7, 'name' => 'Kedah'],
            ['id' => 8, 'name' => 'Kelantan'],
            ['id' => 9, 'name' => 'Pahang'],
            ['id' => 10, 'name' => 'Terengganu'],
            ['id' => 11, 'name' => 'Negeri Sembilan'],
            ['id' => 12, 'name' => 'Perlis'],
            ['id' => 13, 'name' => 'Sabah'],
            ['id' => 14, 'name' => 'Sarawak'],
        ];
        
        \DB::table('states')->insert($states);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
