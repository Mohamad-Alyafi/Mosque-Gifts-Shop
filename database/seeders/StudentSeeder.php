<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $std = [
            [
                "name" => 'std name',
                "email" => 'std group',
                "total_points" => 2500,
                "barcode" => '1000',
            ],
        ];

        Student::insert($std);
    }
}
