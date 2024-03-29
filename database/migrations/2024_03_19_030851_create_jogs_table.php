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
        Schema::create('jogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->dateTime('date');
            $table->float('distance',3,2);
            $table->time('time');
            $table->string('course')->nullable();
            $table->boolean('location')->default(false);
            $table->timestamps();
            $table->boolean('deleteflg')->default(false);
            //外部キー制約
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jogs');
    }
};
