<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditBloodStocksStatusAndDonationTypeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         $status = [
            ['id' => 1, 'name' => 'Good'],
            ['id' => 2, 'name' => 'Decreasing'],
            ['id' => 3, 'name' => 'Low'],
        ];

        \DB::table('stock_statuses')->insert($status);

        Schema::table('blood_stocks', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('donation_type');
            $table->unsignedBigInteger('status_id')->index()->after('blood_type_id')->nullable();
            $table->foreign('status_id')->references('id')->on('stock_statuses');
            $table->unsignedBigInteger('donation_type_id')->index()->after('status_id')->nullable();
            $table->foreign('donation_type_id')->references('id')->on('donation_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
