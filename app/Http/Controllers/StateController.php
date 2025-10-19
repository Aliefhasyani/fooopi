<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller{
    public function index(){
        $states = State::with(['country', 'city', 'addresses'])->get();

        $formatted = $states->map(function($state){
            return [
                'state' => [
                    'id' => $state->id,
                    'name' => $state->name
                ],
                'related data entries' => [
                    'country' => [
                        'country_id' => $state->country->id,
                        'country_name' => $state->country->name,
                        'population' => $state->country->population,
                    ],
                    'cities' => $state->city->map(function ($city) {
                        return [
                            'city_id' => $city->id,
                            'city_name' => $city->name,
                        ];
                    }),
                    'addresses' => $state->addresses->map(function($addresses){
                        return [
                            'address_id' => $addresses->id,
                            'address_name' => $addresses->name,

                        ];
                    })
                ]
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $formatted
        ]);
    }
}
