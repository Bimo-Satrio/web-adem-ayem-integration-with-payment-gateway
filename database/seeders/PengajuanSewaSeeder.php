<?php

namespace Database\Seeders;

use App\Models\PengajuanSewa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanSewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PengajuanSewa::factory()
            ->count(10)
            ->create();
    }
}
