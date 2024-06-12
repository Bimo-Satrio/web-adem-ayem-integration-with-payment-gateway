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
        Schema::create('penghuni', function (Blueprint $table) {
            $table->uuid('id_penghuni')->primary();
            $table->foreignUuid('id_pengajuan_sewa');
            $table->date('jatuh_tempo_tagihan');
            $table->string('tagihan_lama_huni', 12);
            $table->date('batas_pembayaran_tagihan');
            $table->integer('status_pembayaran_tagihan');
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
        Schema::dropIfExists('penghuni');
    }
};
