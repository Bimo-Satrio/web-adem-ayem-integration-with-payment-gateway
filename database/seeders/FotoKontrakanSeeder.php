<?php

namespace Database\Seeders;

use App\Models\fotokontrakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotoKontrakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        fotokontrakan::factory()
            ->count(10)
            ->create();
    }
}
