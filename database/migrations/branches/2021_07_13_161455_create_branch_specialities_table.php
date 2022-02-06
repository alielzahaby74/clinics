<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_speciality', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('speciality_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();



            //relations
            $table->foreign('speciality_id')->references('id')->on('specialities')
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
        Schema::dropIfExists('branch_speciality');
    }
}
