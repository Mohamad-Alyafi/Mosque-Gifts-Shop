<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                "name" => 'Mohamad',
                "email" => 'nihadalyafi@gmail.com',
                'password' => Hash::make('password'),
            ],
        ];
        User::insert($user);
    }
}
