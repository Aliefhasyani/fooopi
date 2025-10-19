<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $states = [
            ['name' => 'South Sulawesi',  'country_id' => 1],
            ['name' => 'West Java',  'country_id' => 1],
            ['name' => 'Selangor',  'country_id' => 2],
            ['name' => 'Sabah' , 'country_id' => 2],
            ['name' => 'Luzon', 'country_id' => 3],
            ['name' => 'Visayas','country_id' => 3],
            ['name' => 'Bangkok',  'country_id' => 4],
            ['name' => 'Chiang Mai',  'country_id' => 4],
            ['name' => 'Hanoi',  'country_id' => 5],
            ['name' => 'Ho Chi Minh City', 'country_id' => 5],
            ['name' => 'Tokyo',  'country_id' => 6],
            ['name' => 'Osaka',  'country_id' => 6],
            ['name' => 'Beijing',  'country_id' => 7],
            ['name' => 'Shanghai',  'country_id' => 7],
            ['name' => 'Central Region',  'country_id' => 8],
            ['name' => 'Laos Province',  'country_id' => 9],
            ['name' => 'Seoul',  'country_id' => 10],
            ['name' => 'Busan', 'country_id' => 10],
            ['name' => 'Pyongyang',  'country_id' => 11],
            ['name' => 'Rason',  'country_id' => 11],
            ['name' => 'New South Wales', 'country_id' => 12],
            ['name' => 'Victoria', 'country_id' => 12],
        ];

        foreach ($states as $s) {
            State::create($s);
        }

    }
}
