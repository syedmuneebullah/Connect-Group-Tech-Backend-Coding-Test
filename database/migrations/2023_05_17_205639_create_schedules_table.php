<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('location_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->string('schedule')->nullable();
            $table->timestamps();

            $table->foreign('location_id')
            ->references('id')
            ->on('locations')
            ->onDelete('cascade');

            $table->foreign('employee_id')
            ->references('id')
            ->on('employees')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
