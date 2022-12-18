<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BlogUserSeeder extends Seeder
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
                'name' => 'Writer',
                'email' => 'writer@upcomingsounds.com',
                'email_verified_at' => Carbon::now(),
                'is_verified_at' => Carbon::now(),
                'password' => Hash::make('D8UiA65f,[SX'),
                'type' => 'admin',
                'is_blog' => 1,
            ],
        ];

        User::insert($users);
    }
}
