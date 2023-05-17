<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceFaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_faults', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('attendance_id')->unsigned();
            $table->string('fault',255)->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
            ->references('id')
            ->on('employees')
            ->onDelete('cascade');

            $table->foreign('attendance_id')
            ->references('id')
            ->on('attendances')
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
        Schema::dropIfExists('attendance_faults');
    }
}
