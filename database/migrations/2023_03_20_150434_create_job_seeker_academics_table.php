<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSeekerAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seeker_academics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->string("standard")->nullable();
            $table->string("marks")->nullable();
            $table->string("institute")->nullable();
            $table->string("board")->nullable();
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
        Schema::dropIfExists('job_seeker_academics');
    }
}
