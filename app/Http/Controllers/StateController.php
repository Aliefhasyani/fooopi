<?php

namespace App\Http\Controllers;

use App\Models\State;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class StateController extends Controller{
    public function index(){
        $states = State::with(['country', 'city', 'addresses'])->get();

        $formatted = $states->map(function($state){
            return [
                'state' => [
                    'state_id' => $state->id,
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
    
    public function show($id){
        try {
            $state = State::with(['country', 'city', 'addresses'])->findOrFail($id);

            $formatted = [
                'state' => [
                    'id' => $state->id,
                    'name' => $state->name
                ],
                'related data entries' => [
                    'country' => [
                        'country_id' => $state->country->id,
                        'name' => $state->country->name,
                        'population' => $state->country->population,
                    ],
                    'cities' => $state->city->map(function ($city) {
                        return [
                            'city_id' => $city->id,
                            'city_name' => $city->name,
                        ];
                    }),
                ]
            ];

            return response()->json([
                'success' => true,
                'data' => $formatted
            ]);

        } catch (ModelNotFoundException $ex) {
            return response()->json([
                'success' => false,
                'message' => 'State not found.',
                'error' => $ex->getMessage()
            ], 404);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving state data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request,$id){
        
    }





}
