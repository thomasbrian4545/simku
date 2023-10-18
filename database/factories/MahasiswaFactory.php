<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenis_kelamin = ["L", "P"];
        $daftar_jurusan = ["Teknik Informatika", "Sistem Informasi", "Ilmu Komputer", "Teknik Komputer", "Teknik Telekomunikasi"];
        return [
            'nim' => $this->faker->randomNumber(8),
            'nama_lengkap' => $this->faker->firstName() . " " . $this->faker->lastName(),
            'jenis_kelamin' => $this->faker->randomElement($jenis_kelamin),
            'jurusan' => $this->faker->randomElement($daftar_jurusan),
            'alamat' => $this->faker->address(),
        ];
    }
}
