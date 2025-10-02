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
            ['name' => 'South Sulawesi', 'population' => 9460334, 'country_id' => 1],
            ['name' => 'West Java', 'population' => 48948000, 'country_id' => 1],
            ['name' => 'Selangor', 'population' => 6589000, 'country_id' => 2],
            ['name' => 'Sabah', 'population' => 3900000, 'country_id' => 2],
            ['name' => 'Luzon', 'population' => 53000000, 'country_id' => 3],
            ['name' => 'Visayas', 'population' => 20000000, 'country_id' => 3],
            ['name' => 'Bangkok', 'population' => 5700000, 'country_id' => 4],
            ['name' => 'Chiang Mai', 'population' => 1300000, 'country_id' => 4],
            ['name' => 'Hanoi', 'population' => 8000000, 'country_id' => 5],
            ['name' => 'Ho Chi Minh City', 'population' => 9000000, 'country_id' => 5],
            ['name' => 'Tokyo', 'population' => 13960000, 'country_id' => 6],
            ['name' => 'Osaka', 'population' => 2700000, 'country_id' => 6],
            ['name' => 'Beijing', 'population' => 21540000, 'country_id' => 7],
            ['name' => 'Shanghai', 'population' => 24800000, 'country_id' => 7],
            ['name' => 'Central Region', 'population' => 5800000, 'country_id' => 8],
            ['name' => 'Laos Province', 'population' => 7275560, 'country_id' => 9],
            ['name' => 'Seoul', 'population' => 9776000, 'country_id' => 10],
            ['name' => 'Busan', 'population' => 3400000, 'country_id' => 10],
            ['name' => 'Pyongyang', 'population' => 2860000, 'country_id' => 11],
            ['name' => 'Rason', 'population' => 200000, 'country_id' => 11],
            ['name' => 'New South Wales', 'population' => 8166369, 'country_id' => 12],
            ['name' => 'Victoria', 'population' => 6740000, 'country_id' => 12],
        ];

        foreach ($states as $s) {
            State::create($s);
        }

    }
}
