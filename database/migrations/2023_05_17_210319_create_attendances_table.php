<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('schedule_id')->unsigned();
            $table->bigInteger('shift_id')->unsigned();
            $table->string('checkin',255)->nullable();
            $table->string('checkout',255)->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
            ->references('id')
            ->on('employees')
            ->onDelete('cascade');
            
            $table->foreign('schedule_id')
            ->references('id')
            ->on('schedules')
            ->onDelete('cascade');
            
            $table->foreign('shift_id')
            ->references('id')
            ->on('shifts')
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
        Schema::dropIfExists('attendances');
    }
}
