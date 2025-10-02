<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $cities = [
            ['name' => 'Parepare', 'state_id' => 1, 'country_id' => 1],
            ['name' => 'Makassar', 'state_id' => 1, 'country_id' => 1],
            ['name' => 'Bandung', 'state_id' => 2, 'country_id' => 1],
            ['name' => 'Bogor', 'state_id' => 2, 'country_id' => 1],

            ['name' => 'Shah Alam', 'state_id' => 3, 'country_id' => 2],
            ['name' => 'Petaling Jaya', 'state_id' => 3, 'country_id' => 2],
            ['name' => 'Kota Kinabalu', 'state_id' => 4, 'country_id' => 2],
            ['name' => 'Sandakan', 'state_id' => 4, 'country_id' => 2],

            ['name' => 'Quezon City', 'state_id' => 5, 'country_id' => 3],
            ['name' => 'Manila', 'state_id' => 5, 'country_id' => 3],
            ['name' => 'Cebu City', 'state_id' => 6, 'country_id' => 3],
            ['name' => 'Iloilo City', 'state_id' => 6, 'country_id' => 3],

            ['name' => 'Bangkok City', 'state_id' => 7, 'country_id' => 4],
            ['name' => 'Nonthaburi', 'state_id' => 7, 'country_id' => 4],
            ['name' => 'Chiang Mai City', 'state_id' => 8, 'country_id' => 4],
            ['name' => 'Lamphun', 'state_id' => 8, 'country_id' => 4],

            ['name' => 'Hanoi City', 'state_id' => 9, 'country_id' => 5],
            ['name' => 'Haiphong', 'state_id' => 9, 'country_id' => 5],
            ['name' => 'Ho Chi Minh City', 'state_id' => 10, 'country_id' => 5],
            ['name' => 'Da Nang', 'state_id' => 10, 'country_id' => 5],

            ['name' => 'Tokyo City', 'state_id' => 11, 'country_id' => 6],
            ['name' => 'Shinjuku', 'state_id' => 11, 'country_id' => 6],
            ['name' => 'Osaka City', 'state_id' => 12, 'country_id' => 6],
            ['name' => 'Sakai', 'state_id' => 12, 'country_id' => 6],

            ['name' => 'Beijing City', 'state_id' => 13, 'country_id' => 7],
            ['name' => 'Chaoyang', 'state_id' => 13, 'country_id' => 7],
            ['name' => 'Shanghai City', 'state_id' => 14, 'country_id' => 7],
            ['name' => 'Pudong', 'state_id' => 14, 'country_id' => 7],

            ['name' => 'Singapore City', 'state_id' => 15, 'country_id' => 8],

            ['name' => 'Vientiane', 'state_id' => 16, 'country_id' => 9],

         
            ['name' => 'Seoul City', 'state_id' => 17, 'country_id' => 10],
            ['name' => 'Incheon', 'state_id' => 17, 'country_id' => 10],
            ['name' => 'Busan City', 'state_id' => 18, 'country_id' => 10],
            ['name' => 'Ulsan', 'state_id' => 18, 'country_id' => 10],

            ['name' => 'Pyongyang City', 'state_id' => 19, 'country_id' => 11],
            ['name' => 'Rason City', 'state_id' => 20, 'country_id' => 11],

          
            ['name' => 'Sydney', 'state_id' => 21, 'country_id' => 12],
            ['name' => 'Newcastle', 'state_id' => 21, 'country_id' => 12],
            ['name' => 'Melbourne', 'state_id' => 22, 'country_id' => 12],
            ['name' => 'Geelong', 'state_id' => 22, 'country_id' => 12],
        ];

        foreach ($cities as $cs) {
            City::create($cs);
        }

    }
}
