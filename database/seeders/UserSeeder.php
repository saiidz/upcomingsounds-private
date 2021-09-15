<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'phone_number' => '03061234567',
                'type' => 'admin',
            ],
            [
                'name' => 'Farhan Akram',
                'email' => 'farhan.a@yumyapps.com',
                'password' => Hash::make('12345678'),
                'phone_number' => '03067878708',
                'type' => 'curator',
            ],

        ];

        User::insert($users);
    }
}
