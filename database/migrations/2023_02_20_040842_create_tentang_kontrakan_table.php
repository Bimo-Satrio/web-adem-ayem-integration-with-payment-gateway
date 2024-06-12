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
        Schema::create('tentang_kontrakan', function (Blueprint $table) {
            $table->uuid('id_tentang_kontrakan')->primary();
            $table->string('judul_tentang_adem_ayem', 50);
            $table->text('deskripsi_tentang_adem_ayem');
            $table->string('foto_tentang_adem_ayem');
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
        Schema::dropIfExists('tentang');
    }
};
