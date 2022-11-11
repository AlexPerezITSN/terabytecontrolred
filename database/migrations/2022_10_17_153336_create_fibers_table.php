<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//use Illuminate\Database\Schema\Blueprint::foreign();

class CreateFibersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fibers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('ip');
            $table->bigInteger('location_id');
            $table->timestamps();
            //$table->foreign('location_id')->references('id')->on('locations')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fibers');
    }
}
