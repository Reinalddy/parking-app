<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('parking_rates', function (Blueprint $table) {
        //     // $table->id();
        //     // $table->unsignedBigInteger('vehicle_type_id');
        //     // $table->decimal('rate_per_hour', 10, 2);
        //     // $table->timestamps();

        //     // // foreign keys
        //     // $table->foreign('vehicle_type_id')->references('id')->on('vehicle_type')->onDelete('cascade');
        // });

        Schema::create('vehicle_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
        Schema::dropIfExists('vehicle_type');
    }
};
