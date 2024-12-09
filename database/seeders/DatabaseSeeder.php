<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecturers;
use App\Models\OtherJob;
use App\Models\Semester;
use App\Models\User;
use Database\Factories\LecturerFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::insert([
            "name" => "jefyokta",
            "username" => "jefyokta2",
            "isHead" => true,
            "password" => Hash::make("jepiokta")
        ]);
        User::insert([
            "name" => "jefyokta",
            "username" => "jefyokta",
            "isHead" => false,
            "password" => Hash::make("jepiokta")
        ]);
        Lecturers::factory(50)->create();

        Course::factory(50)->create();

        OtherJob::insert([
            "name" => "kaprodi",
            "sks" => 3
        ]);
    }
}
