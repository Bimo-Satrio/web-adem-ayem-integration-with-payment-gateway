<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WaitingListModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [


            'id_waiting_list' => Str::uuid(),
            'nama_lengkap_waiting' => \fake()->name(),
            'email_waiting' => \fake()->name(),
            'unit_kontrakan_waiting' => \fake()->name(),
            'no_telefon_waiting' => 123,
            'tanggal_pengajuan' => \fake()->date(),
            'status_waiting_list' => 1,

        ];
    }
}
