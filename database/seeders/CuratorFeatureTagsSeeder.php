<?php

namespace Database\Seeders;

use App\Models\CuratorFeatureTag;
use Illuminate\Database\Seeder;
use function Ramsey\Uuid\v1;

class CuratorFeatureTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        CuratorFeatureTag::truncate();

        $featureCuratorTags = [
            [
                'curator_feature_id' => 1,
                'name' => 'Acting',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Footwear',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Modeling',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Adult Entertainment',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Gaming',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Music',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Arts / Crafts',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Graphic Design',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Nature',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Automotives',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Health / Fitness',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Pets / Animals',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Beauty',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Home Improvement / DIY',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Photography',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Business / Economics',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Humour',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Print / Media / News',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Celebrities',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Kids / Parenting',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Religion',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Dance',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'LGBTQ Community',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Retail',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Education',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Lifestyle',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Sports / Athletics',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Environmentalism',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Literature / Poetry',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Technology',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Fashion',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Marketing',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Retail',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Travel / Leisure',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Film / TV',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Medical',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Food / Beverage',
            ],
            [
                'curator_feature_id' => 1,
                'name' => 'Memes',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Alternative Rock',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Lo-fi Rock',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Dream Pop',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Math Rock',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Emo',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Pop Rock',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Garage Rock',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Post Rock',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Indie Pop',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Psychedelic Rock',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Indie Rock',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Shoegaze',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Indietronica',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Slowcore',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Latin Rock',
            ],
            [
                'curator_feature_id' => 2,
                'name' => 'Surf Rock',
            ],
            [
                'curator_feature_id' => 3,
                'name' => 'Chillwave',
            ],
            [
                'curator_feature_id' => 3,
                'name' => 'Gothic / Dark Wave',
            ],
            [
                'curator_feature_id' => 3,
                'name' => 'Vaporwave',
            ],
            [
                'curator_feature_id' => 3,
                'name' => 'Hyperpop',
            ],
            [
                'curator_feature_id' => 3,
                'name' => 'Wave',
            ],
            [
                'curator_feature_id' => 3,
                'name' => 'Indie Electronic',
            ],
            [
                'curator_feature_id' => 3,
                'name' => 'Witch House',
            ],
            [
                'curator_feature_id' => 3,
                'name' => 'Nu-disco',
            ],
            [
                'curator_feature_id' => 4,
                'name' => '80s Rock',
            ],
            [
                'curator_feature_id' => 4,
                'name' => 'Power Pop',
            ],
            [
                'curator_feature_id' => 4,
                'name' => '90s Rock',
            ],
            [
                'curator_feature_id' => 4,
                'name' => 'Progressive Rock',
            ],
            [
                'curator_feature_id' => 4,
                'name' => 'Art Rock',
            ],
            [
                'curator_feature_id' => 4,
                'name' => 'Rockabilly',
            ],
            [
                'curator_feature_id' => 4,
                'name' => 'Classic Rock',
            ],
            [
                'curator_feature_id' => 4,
                'name' => 'Soft Rock',
            ],
            [
                'curator_feature_id' => 4,
                'name' => 'Krautrock',
            ],
            [
                'curator_feature_id' => 4,
                'name' => 'Southern Rock / Red Dirt',
            ],
            [
                'curator_feature_id' => 4,
                'name' => 'New wave',
            ],
            [
                'curator_feature_id' => 4,
                'name' => 'Synthpop',
            ],
            [
                'curator_feature_id' => 5,
                'name' => '(Neo) Classical',
            ],
            [
                'curator_feature_id' => 5,
                'name' => 'New age',
            ],
            [
                'curator_feature_id' => 5,
                'name' => 'Bossa Nova',
            ],
            [
                'curator_feature_id' => 5,
                'name' => 'Nu Jazz / Jazztronica',
            ],
            [
                'curator_feature_id' => 5,
                'name' => 'Cinematic / Epic Music',
            ],
            [
                'curator_feature_id' => 5,
                'name' => 'Solo Piano',
            ],
            [
                'curator_feature_id' => 5,
                'name' => 'Crossover Classical',
            ],
            [
                'curator_feature_id' => 5,
                'name' => 'Tango',
            ],
            [
                'curator_feature_id' => 5,
                'name' => 'Jazz',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Big Room',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Moombahton',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Brostep',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Psytrance',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Chillstep',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Slap House / Brazilian Bass',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'EDM',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Trance',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Future Bass',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Trap (EDM)',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Hardstyle',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Tropical House',
            ],
            [
                'curator_feature_id' => 6,
                'name' => 'Melbourne Bounce',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Breakbeat',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Glitch Hop',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Chiptune',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Heavy Drum & Bass',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Dubstep',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Juke / Footwork',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Electro',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Light Drum & Bass',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Electro Swing',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Mainline Drum & Bass',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Future / UK Garage',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Riddim / Tearout',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Ghettotech',
            ],
            [
                'curator_feature_id' => 7,
                'name' => 'Vapor Twitch',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Acoustic',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Folktronica',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Americana',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Indie Folk',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Bluegrass',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Neofolk',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Chamber Pop',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Psychedelic / Freak Folk',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Country',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Singer Songwriter',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Folk',
            ],
            [
                'curator_feature_id' => 8,
                'name' => 'Twee',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Alternative Hip-Hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Instrumental Hip-Hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Autotune',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'International Hip-Hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Cloud Hop / Emo Hip-Hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Latin Hip-Hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Deutschrap',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Lo-fi Hip-Hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Drill',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Old-school Hip-Hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'French Hip-Hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Rap',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Gangsta Rap',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Study beats / Jazz-hop / Chill-hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Grime',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Trap (Hip-hop)',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Hip-Hop / Conscious Hip-Hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'UK Hip-Hop',
            ],
            [
                'curator_feature_id' => 9,
                'name' => 'Horrorcore / Trap Metal',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Acid House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Latin House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Acid Techno',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Lo-fi House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Amapiano',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Melodic Techno & House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Bass House / Electro House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Minimal House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Deep House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Minimal Techno',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'French / Filter House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Organic House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Future House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Progressive House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Hard Techno',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Tech House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'House (Old-school)',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Techno',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Jackin House',
            ],
            [
                'curator_feature_id' => 10,
                'name' => 'Tribal / Afro House',
            ],
            [
                'curator_feature_id' => 11,
                'name' => 'Ambient & Drone',
            ],
            [
                'curator_feature_id' => 11,
                'name' => 'Leftfield Bass  ',
            ],
            [
                'curator_feature_id' => 11,
                'name' => 'Downtempo',
            ],
            [
                'curator_feature_id' => 11,
                'name' => 'Lounge',
            ],
            [
                'curator_feature_id' => 11,
                'name' => 'Experimental Electronic',
            ],
            [
                'curator_feature_id' => 11,
                'name' => 'Psydub / Psychill',
            ],
            [
                'curator_feature_id' => 11,
                'name' => 'IDM / Glitch',
            ],
            [
                'curator_feature_id' => 11,
                'name' => 'Trip-Hop',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Black Metal',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Metalcore',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Death Metal',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Noise Rock',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Doom Metal / Sludge',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Post-Metal',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Electronicore',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Post-grunge',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Glam / Hair Metal',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Progressive Metal / Djent',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Gothic Metal',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Rap Metal',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Grunge',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Screamo / Post-Hardcore',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Hard Rock',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Stoner Rock',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Industrial',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Thrash Metal',
            ],
            [
                'curator_feature_id' => 12,
                'name' => 'Melodic Metal',
            ],
            [
                'curator_feature_id' => 13,
                'name' => 'Acapella / Vocal',
            ],
            [
                'curator_feature_id' => 13,
                'name' => 'Holiday Music',
            ],
            [
                'curator_feature_id' => 13,
                'name' => 'Christian',
            ],
            [
                'curator_feature_id' => 13,
                'name' => 'Noise / Harsh Noise Wall',
            ],
            [
                'curator_feature_id' => 13,
                'name' => 'Comedy',
            ],
            [
                'curator_feature_id' => 13,
                'name' => 'Spoken Word',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'Adult Contemporary',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'French Pop',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'Afrobeats / Afro-pop / Afro-fusion',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'German pop (Schlager)',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'Bedroom / Lo-fi Pop',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'International (K-Pop, J-Pop, Eurovision)',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'Commercial',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'Latin Pop',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'Dancehall',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'Reggaeton',
            ],
            [
                'curator_feature_id' => 14,
                'name' => 'Electro Pop',
            ],
            [
                'curator_feature_id' => 15,
                'name' => 'Pop Punk',
            ],
            [
                'curator_feature_id' => 15,
                'name' => 'Punk',
            ],
            [
                'curator_feature_id' => 15,
                'name' => 'Post-Punk',
            ],
            [
                'curator_feature_id' => 15,
                'name' => 'Ska',
            ],
            [
                'curator_feature_id' => 16,
                'name' => 'Alternative / Indie R&B',
            ],
            [
                'curator_feature_id' => 16,
                'name' => 'Electro Funk',
            ],
            [
                'curator_feature_id' => 16,
                'name' => 'Blues',
            ],
            [
                'curator_feature_id' => 16,
                'name' => 'Funk',
            ],
            [
                'curator_feature_id' => 16,
                'name' => 'Contemporary R&B',
            ],
            [
                'curator_feature_id' => 16,
                'name' => 'Neo-Soul',
            ],
            [
                'curator_feature_id' => 16,
                'name' => 'Disco',
            ],
            [
                'curator_feature_id' => 16,
                'name' => 'Retro Soul',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'Cumbia',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'Tropical',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'Dub',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'World Music (African)',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'Flamenco',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'World Music (Far East)',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'Global Bass',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'World Music (Latin & Hispanic)',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'World Music (Middle Eastern & North African)',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'Reggae',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'World Music (Other)',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'Salsa',
            ],
            [
                'curator_feature_id' => 17,
                'name' => 'World Music (South Asian)',
            ],
        ];

        CuratorFeatureTag::insert($featureCuratorTags);
    }
}
