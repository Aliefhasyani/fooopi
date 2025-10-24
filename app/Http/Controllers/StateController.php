<?php

namespace App\Http\Controllers;

use App\Models\State;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    public function store(Request $request){
        try{
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'country_id' => 'required|exists:country,id',
            ]);

            $data = State::create($validated);
            $data->refresh();

            return response()->json(
                [
                    'success' => true,
                    'data_created' => $data

                ]);
        }catch (ValidationException $ex) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'failed to store data!',
                    'errors' => $ex->errors()
                ]);
        }catch(Exception $e){
            return response()->json(
                [
                    'success' => false,
                    'message' => 'failed to store data!',
                    'errors' => $e->getMessage()
                ]);
        }
      
    }
        
        
    public function update(Request $request,$id){
        try{
            
            $state = State::findOrFail($id);
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'country_id' => 'required|exists:country,id',
            ]);

            $state->update($validated);
            $state->refresh();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'data successfully saved!',
                    'data' => $state
                ]);

        
        }catch(ValidationException $ex){
            return response()->json(
                [   'success' => false,
                    'message' => 'error, please fill in all fields',
                    'error' => $ex->errors()
                        
                ],400);
        }catch (ModelNotFoundException $ex) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $ex->getMessage()
                ]);
        }catch(Exception $e){
             return response()->json(
                [
                    'succes' => false,
                    'errors' => $e ->getMessage()
                ],500);
        }
            
    }

    public function destroy($id){
        try{
            $state = State::findOrFail($id);
            $state->delete();

            return response() -> json(
                [
                    'success' => true,
                    'message' => 'data successfully deleted!'
                ]);
        }catch(ModelNotFoundException $ex){
            
        }catch (Exception $e) {
           
        }
    }





}
