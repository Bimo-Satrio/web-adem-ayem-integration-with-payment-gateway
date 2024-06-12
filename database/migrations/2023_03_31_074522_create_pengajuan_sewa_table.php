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
        Schema::create('pengajuan_sewa', function (Blueprint $table) {
            $table->uuid('id_pengajuan_sewa')->primary();
            $table->foreignUuid('id_user');
            $table->string('nama_lengkap_user', 50);
            $table->string('email_user', 255);
            $table->integer('no_telefon_user');
            $table->string('unit_kontrakan', 25);
            $table->string('lokasi_unit_kontrakan', 100);
            $table->integer('harga_unit_kontrakan_total');
            $table->string('lama_huni_unit_kontrakan', 12);
            $table->integer('status_pengajuan_sewa');
            $table->integer('status_identitas');
            $table->integer('status_huni_unit_kontrakan');
            $table->date('tanggal_huni');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.]
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_sewa');
    }
};
