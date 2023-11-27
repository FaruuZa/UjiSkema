<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemilih::class>
 */
class PemilihFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->name(),
            'nama' => fake()->name(),
            'NISN' => '21321312312321',
            'alamat' => 'asdadada',
            'password' => Hash::make('123'), // password
        ];
    }
}
