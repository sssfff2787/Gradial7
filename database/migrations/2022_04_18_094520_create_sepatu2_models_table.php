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
        Schema::create('sepatu2', function (Blueprint $table) {
            $table->increments('idsepatu');
            $table->foreignId('kode_sepatu2');
            $table->string('kodeart',20);
            $table->string('warna',20);
            $table->text('ketsepatu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sepatu2');
    }
};
