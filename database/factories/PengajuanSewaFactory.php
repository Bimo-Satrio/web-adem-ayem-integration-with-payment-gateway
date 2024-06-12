<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengajuanSewa>
 */
class PengajuanSewaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_pengajuan_sewa' => Str::uuid(),
            'id_user' =>  Str::uuid(),
            'nama_lengkap_user' => \fake()->name,
            'email_user' => \fake()->email,
            'no_telefon_user' => 123,
            'unit_kontrakan' => \fake()->name(25),
            'lokasi_unit_kontrakan' => 'JL SIMPANG RAYA NO 100',
            'harga_unit_kontrakan_total' => 50000,
            'lama_huni_unit_kontrakan' => '8 bulan',
            'status_pengajuan_sewa' => 1,
            'status_identitas' => 1,
            'status_huni_unit_kontrakan' => 1,
            'tanggal_huni' => \fake()->date()
        ];
    }
}
