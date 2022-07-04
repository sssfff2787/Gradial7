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
        Schema::create('sepatu1', function (Blueprint $table) {
            $table->increments('kode_sepatu1');
            $table->foreignId('kode_brand2');
            $table->string('namastyle');
            $table->integer('sizemin');
            $table->integer('sizemax');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sepatu1');
    }
};
