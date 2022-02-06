<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('birthdate');
            $table->string('nationalId');
            $table->enum('blood_group', array_keys(Constants::BLOOD_GROUPS))->nullable();
            $table->enum('rhesus', array_keys(Constants::RHESUS_FACTORS))->nullable();
            $table->text('chronic_diseases')->nullable();
            $table->text('genetic_diseases')->nullable();
            $table->text('surgical_history')->nullable();
            $table->text('allergies_history')->nullable();
            $table->text('family_mecdical_history')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('patient');
    }
}
