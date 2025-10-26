<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Expr;

class AddressessController extends Controller
{
    public function index(){
        $addressess = Address::with(['country','state','city','user'])->get();

        $formatted = $addressess->map(function($address){
            return [
                'address' => [
                    'address_id' => $address->id,
                    'address_name' => $address->name,
            
                ],
                'related data entries' => [
                    'city' => [
                        'city_id' => $address->city->id,
                        'city_name' => $address->city->name,
                    ],
                    'state' => [
                        'state_id' => $address->state->id,
                        'state_name' => $address->state->name,
                    ],
                    'country' => [
                        'country_id' => $address->country->id,
                        'country_name' => $address->country->name,
                        'country_population' => $address->country->population,

                    ],
                    'address belongs to' =>[
                        'user_id' => $address->user->id,
                        'user_name' => $address->user->name,
                        'user_email' => $address->user->email,
                    ]
                  
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
            $address = Address::with(['country','state','city','user'])->findOrFail(($id));

            $formatted = [
                'address' => [
                    'address_id' => $address->id,
                    'address_name' => $address->name,
                ],
                'related data entries' => [
                    'city' => [
                        'city_id' =>  $address->city->id,
                        'city_name' => $address->city->name,
                    ],
                    'state' => [
                        'state_id' => $address->state->id,
                        'state_name' => $address->state->name
                    ],
                    'country' => [
                        'country_id' => $address->country->id,
                        'country_name' => $address->country->name,
                        'country_population' => $address->country->population,
                    ],
                    'address belongs to' =>[
                        'user_id' => $address->user->id,
                        'user_name' => $address->user->name,
                        'user_email' => $address->user->email,
                    ]
                    
                ]

            ];

            return response()->json(
                [
                    'success' => true,
                    'data' => $formatted
                ]);

        }catch (ModelNotFoundException $ex) {
            return response()->json(
                [
                    'success' => false,
                    'error' => $ex->getMessage()
                ],404);
        }catch(Exception $e){
             return response()->json(
                [
                    'success' => false,
                    'error' => $e->getMessage()
                ],500);
        }
    }

    public function store(Request $request){
        
        try{
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'country_id' => 'required|exists:country,id',
                'state_id' => 'required|exists:state,id',
                'city_id' => 'required|exists:city,id',
                'user_id' => 'required|exists:user,id',
                ]);

            $address = Address::create($data);
            $address->refresh();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data succesfully created!',
                    'data' => $address,
                ]);
        
        }catch(ValidationException $ex){
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Please fill in all the fields',
                    'errors' => $ex->errors()
                ],422);
        }catch(Exception $e){
             return response()->json(
                [
                    'success' => false,
                    'message' => 'An error occured',
                    'errors' => $e->getMessage()
                ],500);
        }
    }

    public function update(Request $request,$id){
        
        try{

            $address = Address::findOrFail($id);
            
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'country_id' => 'required|exists:country,id',
                'state_id' => 'required|exists:state,id',
                'city_id' => 'required|exists:city,id',
                'user_id' => 'required|exists:user,id',
                ]);

            $address->update($data);
  

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data succesfully updated!',
                    'data' => $address,
                ]);
        
        }catch(ValidationException $ex){
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Please fill in all the fields',
                    'errors' => $ex->errors()
                ],422);
        }catch(Exception $e){
             return response()->json(
                [
                    'success' => false,
                    'message' => 'An error occured',
                    'errors' => $e->getMessage()
                ],500);
        }
    }

    

    public function destroy($id){
        try{
            $address = Address::findOrFail($id);
            $address->delete();
            
            return response()->json(
                [
                    'succes' => true,
                    'message' => 'Data successfully deleted!',
                    
                ]);
        
        }catch (ModelNotFoundException $ex) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Address NOT found!',
                    'error(s)' => $ex->getMessage()
                ],404);
        }catch (Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'An error occured!',
                    'error(s)' => $e->getMessage()
                ],500);
        }
    }
}
