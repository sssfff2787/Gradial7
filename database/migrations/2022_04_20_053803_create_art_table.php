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
        Schema::create('art', function (Blueprint $table) {
            $table->String('kode',10);
            $table->primary('kode');
            $table->String('warna_kode',10);
            $table->foreign('warna_kode')->references('kode')->on('warnas');
            $table->String('style_kode',10);
            $table->foreign('style_kode')->references('kode')->on('styles');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('art');
    }
};
