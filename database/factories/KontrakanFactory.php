<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kontrakan>
 */
class KontrakanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_kontrakan' => Str::uuid(),
            'kontrakan' => 'lorem ipsum',
            'deskripsi' => 'lorem ipsum dolor sit amet',
            'lokasi' => 'haji ali',
            'longitude' => '12345678',
            'latitude' => '12345678',
            'harga' => '800000',
            'status_ketersediaan' => '1',
            'status_huni' => '1',
        ];
    }
}
