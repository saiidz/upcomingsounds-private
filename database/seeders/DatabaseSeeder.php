<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(Countries::class);
    //    $this->call(States::class);
    //    $this->call(Cities::class);
//        $this->call(UserSeeder::class);
//        $this->call(FeatureSeeder::class);
//        $this->call(FeatureTagsSeeder::class);
//        $this->call(TrackCategorySeeder::class);
        $this->call(CuratorFeatureSeeder::class);
        $this->call(CuratorFeatureTagsSeeder::class);
    }
}
