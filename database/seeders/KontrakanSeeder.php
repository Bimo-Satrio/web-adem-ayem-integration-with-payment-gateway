<?php

namespace Database\Seeders;

use App\Models\Kontrakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontrakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kontrakan::factory()
            ->count(6)
            ->create();
    }
}
