<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturers>
 */
class LecturersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        [$role, $gol] = explode('-', $this->faker->randomElement($this->roles()));
        return [
            "name" => $this->faker->name,
            "nip" => $this->faker->unique()->randomNumber(),
            "role" => $role,
            "gol" => $gol
            //
        ];
    }

    public function roles()
    {
        return  [
            "Lektor-III/c",
            "Lektor-III/d",
            "Lektor Kepala-IV/a",
            "Lektor Kepala-IV-b",
            "Asisten Ahli-III/a",
            "Asisten Ahli-III/b",
            "Profesor-IV/c",
            "Profesor-IV/d",
            "Profesor-IV/e",
        ];;
    }
}
