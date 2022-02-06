<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable()->unique();
            $table->string('email')->nullable()->unique(); //
            $table->string('phone')->nullable()->unique(); //
            $table->string('password');
            $table->unsignedBigInteger('speciality_id');
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('speciality_id')->references('id')->on('specialities')
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
        Schema::dropIfExists('doctors');
    }
}
