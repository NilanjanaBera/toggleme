<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("company_id");
            $table->string("branch_name")->nullable();
            $table->text("description")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();

            $table->string("street")->nullable();
            $table->string("area")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("landmark")->nullable();
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
        Schema::dropIfExists('branches');
    }
}
