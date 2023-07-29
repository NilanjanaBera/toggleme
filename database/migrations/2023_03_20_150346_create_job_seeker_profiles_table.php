<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSeekerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seeker_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->string("profile_image")->nullable();
            $table->text("about")->nullable();
            $table->date("dob")->nullable();
            $table->string("gender")->nullable();
            $table->string("street")->nullable();
            $table->string("landmark")->nullable();
            $table->string("area")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("pin")->nullable();
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
        Schema::dropIfExists('job_seeker_profiles');
    }
}
