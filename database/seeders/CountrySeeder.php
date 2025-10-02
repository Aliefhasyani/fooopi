<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $countries = [
                ['name' => 'Indonesia', 'population' => 273523615],
                ['name' => 'Malaysia', 'population' => 32365999],
                ['name' => 'Philippines', 'population' => 109581078],
                ['name' => 'Thailand', 'population' => 69799978],
                ['name' => 'Vietnam', 'population' => 97338579],
                ['name' => 'Japan', 'population' => 126476461],
                ['name' => 'China', 'population' => 1439323776],
                ['name' => 'Singapore', 'population' => 5850342],
                ['name' => 'Laos', 'population' => 7275560],
                ['name' => 'South Korea', 'population' => 51269185],
                ['name' => 'North Korea', 'population' => 25778816],
                ['name' => 'Australia', 'population' => 25499884],
        ];

        foreach($countries as $c){
            Country::create($c);
        }
        
    }
}
