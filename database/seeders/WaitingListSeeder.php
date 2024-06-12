<?php

namespace Database\Seeders;

use App\Models\WaitingListModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaitingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WaitingListModel::factory()

            ->count(20)
            ->create();
    }
}
