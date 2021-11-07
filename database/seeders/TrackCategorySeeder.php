<?php

namespace Database\Seeders;

use App\Models\TrackCategory;
use Illuminate\Database\Seeder;

class TrackCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $track_category = [
            [
                'name' => 'acoustic',
            ],
            [
                'name' => 'ambient',
            ],
            [
                'name' => 'blues',
            ],
            [
                'name' => 'classical',
            ],
            [
                'name' => 'country',
            ],
            [
                'name' => 'electronic',
            ],
            [
                'name' => 'emo',
            ],
            [
                'name' => 'folk',
            ],
            [
                'name' => 'hardcore',
            ],
            [
                'name' => 'hip hop',
            ],
            [
                'name' => 'indie',
            ],
            [
                'name' => 'jazz',
            ],
            [
                'name' => 'latin',
            ],
            [
                'name' => 'metal',
            ],
            [
                'name' => 'pop',
            ],
            [
                'name' => 'pop punk',
            ],
            [
                'name' => 'punk',
            ],
            [
                'name' => 'reggae',
            ],
            [
                'name' => 'rnb',
            ],
            [
                'name' => 'rock',
            ],
            [
                'name' => 'soul',
            ],
            [
                'name' => 'world',
            ],
        ];

        TrackCategory::insert($track_category);
    }
}
