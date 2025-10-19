<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddMoreUserToAddressess extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $addresses = [
        [
            'name' => '1-2-3 Shibuya, Tokyo',
            'country_id' => 2,
            'state_id' => 3,
            'city_id' => 3,
            'user_id' => 2,
        ],
        [
            'name' => '2-4-1 Shinjuku, Tokyo',
            'country_id' => 2,
            'state_id' => 3,
            'city_id' => 4,
            'user_id' => 3,
        ],
    ];

    foreach ($addresses as $address) {
        Address::create($address);
    }

    }
}
