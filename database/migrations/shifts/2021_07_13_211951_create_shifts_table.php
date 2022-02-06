<?php

use App\Helpers\Constants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('branch_id');
            $table->enum('day', array_keys(Constants::DAYS_OF_WEEK));
            $table->time('from');
            $table->time('to');
            $table->integer('duration')->nullable();
            $table->enum('type', array_keys(Constants::SHIFT_TYPES));
            $table->integer('max_reservation')->nullable()->default(0);
            //$table->integer('time_slot')->nullable()->default(0); we can get the time from the columns (from - to)
            $table->timestamps();



            // unique
            $table->unique(['doctor_id','branch_id','day','from','to']);


            // relations
            $table->foreign('doctor_id')->references('id')->on('doctors')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('branch_id')->references('id')->on('branches')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shifts');
    }
}
