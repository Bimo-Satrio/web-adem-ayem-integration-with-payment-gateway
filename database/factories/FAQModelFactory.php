<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FAQModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_faq' => Str::uuid(),
            'judul_faq' => "Lorem Ipsum Dolor SIt Amet",
            'deskripsi_faq' => "lorem Ipsum",
        ];
    }
}
