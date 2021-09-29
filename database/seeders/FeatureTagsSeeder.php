<?php

namespace Database\Seeders;

use App\Models\FeatureTag;
use Illuminate\Database\Seeder;
use function Ramsey\Uuid\v1;

class FeatureTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feature_tags = [
            [
                'feature_id' => 1,
                'name' => 'Death / Thrash',
            ],
            [
                'feature_id' => 1,
                'name' => 'Hardcore',
            ],
            [
                'feature_id' => 1,
                'name' => 'Heavy metal',
            ],
            [
                'feature_id' => 1,
                'name' => 'Melodic metal',
            ],
            [
                'feature_id' => 1,
                'name' => 'Metal',
            ],
            [
                'feature_id' => 1,
                'name' => 'Noise',
            ],
            [
                'feature_id' => 2,
                'name' => 'Dub',
            ],
            [
                'feature_id' => 2,
                'name' => 'Hip-hop / Rap',
            ],
            [
                'feature_id' => 2,
                'name' => 'Reggae',
            ],
            [
                'feature_id' => 3,
                'name' => 'Canzone Italiana',
            ],
            [
                'feature_id' => 3,
                'name' => 'R& French variety',
            ],
            [
                'feature_id' => 3,
                'name' => 'Nouvelle scene',
            ],
            [
                'feature_id' => 4,
                'name' => 'Classical music',
            ],
            [
                'feature_id' => 4,
                'name' => 'Film music',
            ],
            [
                'feature_id' => 4,
                'name' => 'Instrumental',
            ],
            [
                'feature_id' => 4,
                'name' => 'Neoclassical',
            ],
            [
                'feature_id' => 5,
                'name' => 'Acid house',
            ],
            [
                'feature_id' => 5,
                'name' => 'Afrobeat',
            ],
            [
                'feature_id' => 5,
                'name' => 'Ambient',
            ],
            [
                'feature_id' => 5,
                'name' => 'Bass Music',
            ],
            [
                'feature_id' => 5,
                'name' => 'Beats',
            ],
            [
                'feature_id' => 5,
                'name' => 'Chill out',
            ],
            [
                'feature_id' => 5,
                'name' => 'Dance music',
            ],
            [
                'feature_id' => 5,
                'name' => 'Deep house',
            ],
            [
                'feature_id' => 5,
                'name' => 'Disco',
            ],
            [
                'feature_id' => 5,
                'name' => 'Drum and Bass',
            ],
            [
                'feature_id' => 5,
                'name' => 'Dubstep',
            ],
            [
                'feature_id' => 5,
                'name' => 'Electro swing',
            ],
            [
                'feature_id' => 5,
                'name' => 'Electronica',
            ],
            [
                'feature_id' => 5,
                'name' => 'Experimental electronic',
            ],
            [
                'feature_id' => 5,
                'name' => 'French house',
            ],
            [
                'feature_id' => 5,
                'name' => 'Hardstyle / Hardcore',
            ],
            [
                'feature_id' => 5,
                'name' => 'House music',
            ],
            [
                'feature_id' => 5,
                'name' => 'Minimal',
            ],
            [
                'feature_id' => 5,
                'name' => 'Nu-disco',
            ],
            [
                'feature_id' => 5,
                'name' => 'Synthwave',
            ],
            [
                'feature_id' => 5,
                'name' => 'Techno',
            ],
            [
                'feature_id' => 5,
                'name' => 'Trance',
            ],
            [
                'feature_id' => 5,
                'name' => 'Trip hop',
            ],
            [
                'feature_id' => 6,
                'name' => 'Country Americana',
            ],
            [
                'feature_id' => 6,
                'name' => 'Indie folk',
            ],
            [
                'feature_id' => 6,
                'name' => 'Singer songwriter',
            ],
            [
                'feature_id' => 7,
                'name' => 'Experimental jazz',
            ],
            [
                'feature_id' => 7,
                'name' => 'Jazz fusion',
            ],
            [
                'feature_id' => 7,
                'name' => 'Modern jazz',
            ],
            [
                'feature_id' => 8,
                'name' => 'Dance pop',
            ],
            [
                'feature_id' => 8,
                'name' => 'Dream pop',
            ],
            [
                'feature_id' => 8,
                'name' => 'Electropop',
            ],
            [
                'feature_id' => 8,
                'name' => 'Indie pop',
            ],
            [
                'feature_id' => 8,
                'name' => 'International pop',
            ],
            [
                'feature_id' => 8,
                'name' => 'K-pop / J-pop',
            ],
            [
                'feature_id' => 8,
                'name' => 'Lofi bedroom',
            ],
            [
                'feature_id' => 8,
                'name' => 'Pop rock',
            ],
            [
                'feature_id' => 8,
                'name' => 'Pop soul',
            ],
            [
                'feature_id' => 8,
                'name' => 'Progressive pop',
            ],
            [
                'feature_id' => 8,
                'name' => 'Synthpop',
            ],
            [
                'feature_id' => 9,
                'name' => 'Funk',
            ],
            [
                'feature_id' => 9,
                'name' => 'R&B',
            ],
            [
                'feature_id' => 9,
                'name' => 'Soul',
            ],
            [
                'feature_id' => 9,
                'name' => 'Urban pop',
            ],
            [
                'feature_id' => 10,
                'name' => 'Alternative rock',
            ],
            [
                'feature_id' => 10,
                'name' => 'Blues',
            ],
            [
                'feature_id' => 10,
                'name' => 'Coldwave',
            ],
            [
                'feature_id' => 10,
                'name' => 'Electronic rock',
            ],
            [
                'feature_id' => 10,
                'name' => 'Experimental rock',
            ],
            [
                'feature_id' => 10,
                'name' => 'Garage rock',
            ],
            [
                'feature_id' => 10,
                'name' => 'Hard rock',
            ],
            [
                'feature_id' => 10,
                'name' => 'Indie rock',
            ],
            [
                'feature_id' => 10,
                'name' => 'New wave',
            ],
            [
                'feature_id' => 10,
                'name' => 'Pop Punk',
            ],
            [
                'feature_id' => 10,
                'name' => 'Progressive rock',
            ],
            [
                'feature_id' => 10,
                'name' => 'Psychedelic rock',
            ],
            [
                'feature_id' => 10,
                'name' => 'Punk Rock',
            ],
            [
                'feature_id' => 10,
                'name' => 'Rock & roll',
            ],
            [
                'feature_id' => 10,
                'name' => 'Shoegaze',
            ],
            [
                'feature_id' => 10,
                'name' => 'Surf rock',
            ],
            [
                'feature_id' => 11,
                'name' => 'African music',
            ],
            [
                'feature_id' => 11,
                'name' => 'Asian music ',
            ],
            [
                'feature_id' => 11,
                'name' => 'Bossa nova',
            ],
            [
                'feature_id' => 11,
                'name' => 'Brazilian Music',
            ],
            [
                'feature_id' => 11,
                'name' => 'Christian Music',
            ],
            [
                'feature_id' => 11,
                'name' => 'Dancehall / Reggaeton',
            ],
            [
                'feature_id' => 11,
                'name' => 'Latin music',
            ],
            [
                'feature_id' => 11,
                'name' => 'Oriental music',
            ],
            [
                'feature_id' => 11,
                'name' => 'Traditional music',
            ],
            [
                'feature_id' => 12,
                'name' => 'Authentic',
            ],
            [
                'feature_id' => 12,
                'name' => 'Catchy',
            ],
            [
                'feature_id' => 12,
                'name' => 'Chill',
            ],
            [
                'feature_id' => 12,
                'name' => 'Contemporary',
            ],
            [
                'feature_id' => 12,
                'name' => 'Creative',
            ],
            [
                'feature_id' => 12,
                'name' => 'Curious',
            ],
            [
                'feature_id' => 12,
                'name' => 'Dancing',
            ],
            [
                'feature_id' => 12,
                'name' => 'Dark',
            ],
            [
                'feature_id' => 12,
                'name' => 'Downbeat',
            ],
            [
                'feature_id' => 12,
                'name' => 'Drama',
            ],
            [
                'feature_id' => 12,
                'name' => 'Dreamy',
            ],
            [
                'feature_id' => 12,
                'name' => 'Eccentric',
            ],
            [
                'feature_id' => 12,
                'name' => 'Eclectic',
            ],
            [
                'feature_id' => 12,
                'name' => 'Energetic',
            ],
            [
                'feature_id' => 12,
                'name' => 'Engaged',
            ],
            [
                'feature_id' => 12,
                'name' => 'Experimental',
            ],
            [
                'feature_id' => 12,
                'name' => 'Fusion',
            ],
            [
                'feature_id' => 12,
                'name' => 'Good vibes',
            ],
            [
                'feature_id' => 12,
                'name' => 'Groovy',
            ],
            [
                'feature_id' => 12,
                'name' => 'Hardcore',
            ],
            [
                'feature_id' => 12,
                'name' => 'Indie',
            ],
            [
                'feature_id' => 12,
                'name' => 'Indie',
            ],
            [
                'feature_id' => 12,
                'name' => 'Intense',
            ],
            [
                'feature_id' => 12,
                'name' => 'Lo-fi',
            ],
            [
                'feature_id' => 12,
                'name' => 'Mainstream',
            ],
            [
                'feature_id' => 12,
                'name' => 'Meaningful lyrics',
            ],
            [
                'feature_id' => 12,
                'name' => 'Melancholic',
            ],

            [
                'feature_id' => 12,
                'name' => 'Melodic',
            ],
            [
                'feature_id' => 12,
                'name' => 'Midtempo',
            ],
            [
                'feature_id' => 12,
                'name' => 'Offset',
            ],
            [
                'feature_id' => 12,
                'name' => 'Original',
            ],
            [
                'feature_id' => 12,
                'name' => 'Positive',
            ],
            [
                'feature_id' => 12,
                'name' => 'Provocative',
            ],
            [
                'feature_id' => 12,
                'name' => 'Psych',
            ],
            [
                'feature_id' => 12,
                'name' => 'Relax',
            ],
            [
                'feature_id' => 12,
                'name' => 'Romantic',
            ],
            [
                'feature_id' => 12,
                'name' => 'Sensual',
            ],
            [
                'feature_id' => 12,
                'name' => 'Simple',
            ],
            [
                'feature_id' => 12,
                'name' => 'Sober',
            ],
            [
                'feature_id' => 12,
                'name' => 'Standard',
            ],
            [
                'feature_id' => 12,
                'name' => 'Strong universe',
            ],
            [
                'feature_id' => 12,
                'name' => 'Surprising',
            ],
            [
                'feature_id' => 12,
                'name' => 'Tropical',
            ],
            [
                'feature_id' => 12,
                'name' => 'Underground',
            ],
            [
                'feature_id' => 12,
                'name' => 'Unique',
            ],
            [
                'feature_id' => 12,
                'name' => 'Upbeat',
            ],
            [
                'feature_id' => 12,
                'name' => 'Weird',
            ],
            [
                'feature_id' => 13,
                'name' => 'Available on Spotify',
            ],
            [
                'feature_id' => 13,
                'name' => 'Composer',
            ],
            [
                'feature_id' => 13,
                'name' => 'Early project',
            ],
            [
                'feature_id' => 13,
                'name' => 'International potential',
            ],
            [
                'feature_id' => 13,
                'name' => 'On stage experience',
            ],
            [
                'feature_id' => 13,
                'name' => 'Strong social media presence',
            ],
            [
                'feature_id' => 13,
                'name' => 'Supported artist',
            ],
            [
                'feature_id' => 13,
                'name' => 'Unsigned artist',
            ],
            [
                'feature_id' => 13,
                'name' => 'Upcoming project',
            ],
            [
                'feature_id' => 13,
                'name' => 'Young talents',
            ],
            [
                'feature_id' => 14,
                'name' => 'Chill hip-hop',
            ],
            [
                'feature_id' => 14,
                'name' => 'French rap',
            ],
            [
                'feature_id' => 14,
                'name' => 'Grime',
            ],
            [
                'feature_id' => 14,
                'name' => 'Hip-hop',
            ],
            [
                'feature_id' => 14,
                'name' => 'Rap',
            ],
            [
                'feature_id' => 14,
                'name' => 'Trap',
            ],
        ];

        FeatureTag::insert($feature_tags);
    }
}
