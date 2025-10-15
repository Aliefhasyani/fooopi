<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Validation\ValidationException;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CityController extends Controller
{   
    //show all cities with relationships
    public function index(){
        $cities = City::with(['country', 'state'])->get();

        $formatted = $cities->map(function ($city) {
            return [
                
                'city'=>[
                    'id' => $city->id,
                    'name' => $city->name,
                ],
                'related data entry' => [
                    'state' => [
                        'id'=> $city->state->id,
                        'name' => $city->state->name ?? null,
                        
                    ],
                    'country' => [
                        'id'=> $city->country->id,
                        'name' => $city->country->name ?? null,
                        'population' => $city->country->population ?? null,
                    ],
                ],
             
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $formatted
        ]);
    }

    //show specific city with relationship
    public function show($id){

        $city = City::with(['country','state'])->findOrFail($id);

        return response()->json(
            [   
                'success' => true,
                'city' => $city
            ]);
    }

    //store new city record(HAS EXCEPTION)
    public function store(Request $request){
        try{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'country_id' => 'required|exists:country,id',
                'state_id' => 'required|exists:state,id',
            ]);

            $city = City::create($validated);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'data created!',
                    'data' => $city

                ]);
        }catch(ValidationException $e){
             return response()->json(
                [   'success' => false,
                    'errors' => [
                        [   
                            'message' => 'an error occured',
                            'error' => $e->errors()
                        ]
                    ]
                    
                    

                ],400);
        }catch(Exception $ex){
            return response()->json(
                [
                    'succes' => false,
                    'errors' => $ex ->getMessage()
                ],500);
        }
    }

    //update a city(HAS EXCEPTION)
    public function update(Request $request,$id){
        $city = City::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255|required',
            'state_id'=> 'required|exists:state,id',
            'country_id'=> 'required|exists:country,id',

        ]);

        $city->update($validated);
        $city->refresh();

        return response()->json(
            [
                'success' => true,
                'message' => 'data updated',
                'data' => $city
            ]);
    }

    //delete a city
    public function destroy($id){
    try {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json([
            'success' => true,
            'message' => 'data deleted!'
        ]);
    }catch (ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 404);
    }catch (Exception $ex) {
        return response()->json([
            'success' => false,
            'message' => $ex->getMessage()
        ], 500);
    }
}

        
     

  
    
}
