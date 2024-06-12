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
        Schema::create('syarat_ketentuan', function (Blueprint $table) {
            $table->uuid('id_syarat_ketentuan')->primary();
            $table->string('judul_syarat_ketentuan', 50);
            $table->text('deskripsi_syarat_ketentuan');
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
        Schema::dropIfExists('syaratketentuan');
    }
};
