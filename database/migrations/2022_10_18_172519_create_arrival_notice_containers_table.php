<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrival_notice_containers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('arrival_notice_id')->unsigned();
            $table->integer('equipment_id')->unsigned()->nullable();
            $table->string('seal_no')->nullable();
            $table->string('marks')->nullable();
            $table->integer('type_of_unit_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('arrival_notice_id')->references('id')->on('arrival_noticies')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
            $table->foreign('type_of_unit_id')->references('id')->on('type_of_units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrival_notice_containers');
    }
};
