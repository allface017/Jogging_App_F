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
        Schema::create('spot_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('jogs_id');
            $table->unsignedBigInteger('spots_id');
            $table->timestamps();
            //外部キー制約
            $table->foreign('jogs_id')->references('id')->on('jogs');
            $table->foreign('spots_id')->references('id')->on('spots');
            //複合主キー
            // $table->primary(['jogs_id', 'spots_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spot_lists');
    }
};
