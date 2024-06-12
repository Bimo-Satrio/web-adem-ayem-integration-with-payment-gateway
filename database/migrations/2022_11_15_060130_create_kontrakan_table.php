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
        Schema::create('kontrakan', function (Blueprint $table) {
            $table->uuid('id_kontrakan')->primary();
            $table->string('kontrakan', 25);
            $table->text('deskripsi');
            $table->string('lokasi', 100);
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('harga');
            $table->boolean('status_ketersediaan');
            $table->boolean('status_huni');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontrakan');
    }
};
