<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->randomElement([
                'Pemrograman Web',
                'Sistem Basis Data',
                'Algoritma dan Struktur Data',
                'Jaringan Komputer',
                'Kecerdasan Buatan',
                'Statistika dan Probabilitas',
                'Manajemen Proyek TI',
                'Desain Antarmuka Pengguna',
                'Keamanan Informasi',
                'Komputasi Awan',
                'Sistem Operasi',
                'Pemrograman Mobile',
                'Matematika Diskrit',
                'Analisis dan Desain Sistem',
                'Pengolahan Citra Digital',
            ]),
            "sks" => $this->faker->randomElement([2, 3, 4]),
            "class" => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
            "studyprogram" => "sistem informasi",
            "semester" => rand(1, 9),
            "code" => strtoupper($this->faker->unique()->lexify('MK-???')),
        ];
    }
}
