<?php

namespace Database\Seeders;

use App\Models\CuratorFeature;
use Illuminate\Database\Seeder;

class CuratorFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        CuratorFeature::truncate();

        $curatorFeature = [
            [
                'name' => 'Interest',
            ],
            [
                'name' => 'Alternative / Indie',
            ],
            [
                'name' => 'Blogwave',
            ],
            [
                'name' => 'Classic',
            ],
            [
                'name' => 'Classical / Jazz',
            ],
            [
                'name' => 'EDM',
            ],
            [
                'name' => 'Electronica / Breaks',
            ],
            [
                'name' => 'Folk',
            ],
            [
                'name' => 'Hip-hop / Rap',
            ],
            [
                'name' => 'House / Techno',
            ],
            [
                'name' => 'IDM / Downtempo',
            ],
            [
                'name' => 'Metal / Hard Rock',
            ],
            [
                'name' => 'Other',
            ],
            [
                'name' => 'Pop',
            ],
            [
                'name' => 'Punk / Ska',
            ],
            [
                'name' => 'RnB / Funk / Soul',
            ],
            [
                'name' => 'World Music',
            ],

        ];

        CuratorFeature::insert($curatorFeature);
    }
}
