<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feature = [
            [
                'name' => 'Metal',
            ],
            [
                'name' => 'Reggae',
            ],
            [
                'name' => 'Popular Music',
            ],
            [
                'name' => 'Classic / Instrumental',
            ],
            [
                'name' => 'Electronic',
            ],
            [
                'name' => 'Folk / Acoustic',
            ],
            [
                'name' => 'Jazz',
            ],
            [
                'name' => 'Pop',
            ],
            [
                'name' => 'R&B / Soul',
            ],
            [
                'name' => 'Rock / Punk',
            ],
            [
                'name' => 'World',
            ],
            [
                'name' => 'Moods',
            ],
            [
                'name' => 'Evolution & Status',
            ],
            [
                'name' => 'Hip-hop / Rap',
            ],

        ];

        Feature::insert($feature);
    }
}
