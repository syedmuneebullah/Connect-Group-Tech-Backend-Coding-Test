<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->bigInteger('location_id')->unsigned();
            $table->bigInteger('asset_id')->unsigned();
            $table->timestamps();

            $table->foreign('location_id')
            ->references('id')
            ->on('locations')
            ->onDelete('cascade');

            $table->foreign('asset_id')
            ->references('id')
            ->on('assets')
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
        Schema::dropIfExists('companies');
    }
}
