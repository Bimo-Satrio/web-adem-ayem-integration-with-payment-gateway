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
        Schema::create('foto_kontrakan', function (Blueprint $table) {
            $table->uuid('id_foto_kontrakan')->primary();
            $table->foreignUuid('id_kontrakan')->nullable();
            $table->string('foto_kontrakan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_kontrakan');
    }
};
