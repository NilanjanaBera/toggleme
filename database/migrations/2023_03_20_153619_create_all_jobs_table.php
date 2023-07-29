<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_jobs', function (Blueprint $table) {
            $table->id();
            $table->string("job_name");
            $table->date("opening_date");
            $table->date("closing_date");
            $table->text("information");
            $table->string("location");
            $table->string("state");
            $table->string("job_designation");
            $table->string("image")->nullable();
            $table->boolean("salary_disclosed");
            $table->double("salary_min")->nullable();
            $table->double("salary_max")->nullable();
            $table->string("min_qualification")->nullable();
            $table->integer("min_experience")->nullable();
            $table->integer("max_experience")->nullable();
            $table->bigInteger("user_id");
            $table->boolean("published")->default(0);
            $table->timestamps();

            // Salary discolosed yes no, standard to industry/ range
            // salary min
            // salary max
            // skills required
            // education required
            // Location

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_jobs');
    }
}
