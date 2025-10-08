<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $addresses = [
        
            [
                'name' => 'Jl. Merdeka No. 10, Jakarta Pusat',
                'country_id' => 1,
                'state_id' => 1,
                'city_id' => 1,
                'user_id' => 1,
            ],
            [
                'name' => 'Jl. Sudirman No. 88, Bandung',
                'country_id' => 1,
                'state_id' => 2,
                'city_id' => 2,
                'user_id' => 2,
            ],


            [
                'name' => '1-2-3 Shibuya, Tokyo',
                'country_id' => 2,
                'state_id' => 3,
                'city_id' => 3,
                'user_id' => 3,
            ],
            [
                'name' => '4-5-6 Namba, Osaka',
                'country_id' => 2,
                'state_id' => 4,
                'city_id' => 4,
                'user_id' => 1,
            ],

    
            [
                'name' => '742 Evergreen Terrace, Springfield',
                'country_id' => 3,
                'state_id' => 5,
                'city_id' => 5,
                'user_id' => 2
            ],
            [
                'name' => '1600 Pennsylvania Avenue NW, Washington D.C.',
                'country_id' => 3,
                'state_id' => 6,
                'city_id' => 6,
                'user_id' => 3,
            ],

        
            [
                'name' => '10 Downing Street, London',
                'country_id' => 4,
                'state_id' => 7,
                'city_id' => 7,
                'user_id' => 1,
            ],
            [
                'name' => '221B Baker Street, London',
                'country_id' => 4,
                'state_id' => 7,
                'city_id' => 7,
                'user_id' => 2,
            ],

         
            [
                'name' => '12 Rue de Rivoli, Paris',
                'country_id' => 5,
                'state_id' => 8,
                'city_id' => 8,
                'user_id' => 3,
            ],
            [
                'name' => '35 Avenue des Champs-Élysées, Paris',
                'country_id' => 5,
                'state_id' => 8,
                'city_id' => 8,
                'user_id' => 1,
            ],
        ];

   
        foreach($addresses as $a){
            Address::create($a);
        }
    }


}
