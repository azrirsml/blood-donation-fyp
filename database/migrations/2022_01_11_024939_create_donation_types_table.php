<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $types = [
            ['id' => 1, 'name' => 'Whole'],
            ['id' => 2, 'name' => 'Component']
        ];

        $status = [
            ['id' => 1, 'name' => 'Pending'],
            ['id' => 2, 'name' => 'Approved'],
            ['id' => 3, 'name' => 'Cancelled']
        ];

        \DB::table('donation_types')->insert($types);
        
        \DB::table('statuses')->insert($status);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_types');
    }
}
