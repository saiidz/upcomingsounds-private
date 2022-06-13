<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'name' => 'arabic',
            ]
            ,[
                'name' => 'chinese',
            ]
            ,[
                'name' => 'danish',
            ]
            ,[
                'name' => 'dutch',
            ]
            ,[
                'name' => 'english',
            ]
            ,[
                'name' => 'french',
            ]
            ,[
                'name' => 'german',
            ]
            ,[
                'name' => 'hebrew',
            ]
            ,[
                'name' => 'hindi',
            ]
            ,[
                'name' => 'Instrumental / Without lyrics',
            ]
            ,[
                'name' => 'Italian',
            ]
            ,[
                'name' => 'Japanese',
            ]
            ,[
                'name' => 'Portuguese',
            ]
            ,[
                'name' => 'Russian',
            ]
            ,[
                'name' => 'Spanish',
            ]
            ,[
                'name' => 'Swedish',
            ]
        ];

        Language::insert($languages);
    }
}
