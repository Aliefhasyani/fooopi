<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::with(['states','cities','addressess'])->get();
        
        $formatted = $countries->map(function($country){
            return [
                'country' => [
                    'country_id' => $country->id,
                    'country_name' => $country->name,
                    'country_population' => $country->population,
                ],
                'related data entries' => [
                    'state' => $country->states->map(function($state){
                        return [
                            'state_id' => $state->id,
                            'state_name' => $state->name,
                        ];
                    }),
                    'cities' => $country ->cities->map(function($city){
                        return [
                            'city_id' => $city->id,
                            'city_name' => $city->name,
                        ];
                    }),
                    'addressess' => $country->addressess->map(function($address){
                        return [
                            'address_id' => $address->id,
                            'address_name' => $address->name,
                        ];
                    })
                ]

            ];
        });

        return response()->json(
            [
                'success' => true,
                'data' => $formatted

            ]);
    }

    public function show($id){
        try{    
            $country = Country::with(['states','cities','addressess'])->findOrFail($id);

            $formatted = [
                    [
                        'country' => [
                            'country_id' => $country->id,
                            'country_name' => $country->name,
                            'country_population' => $country->population,
                        ],
                        'related data entries' => [
                            'state' => $country->states->map(function($state){
                                return [
                                    'state_id' => $state->id,
                                    'state_name' => $state->name,
                                ];
                            }),
                            'city' => $country->cities->map(function($city){
                                return [
                                    'city_id' => $city->id,
                                    'city_name' => $city->name,
                                ];
                            }),
                            'addressess' => $country->addressess->map(function($address){
                                return [
                                    'address_id' => $address->id,
                                    'address_name' => $address->name,

                                ];
                            })
                        ]
                    ]
                ];

                return response() -> json(
                    [
                        'success' => true,
                        'data' => $formatted
                    ]);

        }catch (ModelNotFoundException $ex) {
            return response()->json(
                [
                    'success' => false,
                    'errors' => $ex->getMessage()
                ],404);
        }catch (Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'errors' => $e->getMessage()
                ]);
        }
    }

    public function destroy($id){
        try{
            $country = Country::findOrFail($id);

            $country->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data successfully deleted!'
                ]);
        }catch(ModelNotFoundException $ex){
            return response()->json(
                [
                    'success' => false,
                    'message' => $ex->getMessage()
                ],404);
        }catch(Exception $e){
            return response()->json(
                [
                    'success' => false,
                    'message' => $e->getMessage()
                ]);
        }
    }

}
