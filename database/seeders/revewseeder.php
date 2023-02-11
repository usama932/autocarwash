<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class revewseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'user_id' => '0',
            'user' => 'Abaigael',
            'rating' => '5',
            'is_feature' => 'yes',
            'remarks' => "Pleasantly surprised by this car wash. I also love that the vacuums are free and are pretty powerful."
        ]);
         Review::create([
            'user_id' => '0',
            'user' => 'Earthling',
            'rating' => '5',
            'is_feature' => 'yes',
            'remarks' => "This place is AWESOME! I have never been anything less than ecstatic about the quality of service.

            As far as the review previously on here, there are holes in the vacuum heads for a reason, it helps with the suction.."
        ]);
        Review::create([
            'user_id' => '0',
            'user' => 'Watorea',
            'rating' => '5',
            'is_feature' => 'yes',
            'remarks' => "Love them! Best carwash around by far. Leaves my car shiny every time!."
        ]);
        Review::create([
            'user_id' => '0',
            'user' => 'Maroochy',
            'rating' => '5',
            'is_feature' => 'yes',
            'remarks' => "They scrubbed the parts of my car that wouldn’t get hit by the machine and gave me a free mirror hanging air freshener.

            I was in a rush so I didn’t use the vacuums, But they looked really good and my car really could have used it.."
        ]);
    
    }
    
}
