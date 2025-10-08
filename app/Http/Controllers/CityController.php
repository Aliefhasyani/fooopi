<?php

namespace App\Http\Controllers;

use App\Models\City;
use Exception;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        
        $cities = City::with(['country','state'])->get();

        return response()->json(
            [
                "cities" => $cities

            ]);
    }
    
    public function show($id){

        $city = City::with(['country','state'])->findOrFail($id);

        return response()->json(
            [
                "city" => $city
            ]);
    }

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
                    "message" => "data created!",
                    "data" => $city

                ]);
        }catch(Exception $e){
             return response()->json(
                [
                    "message" => "an error occured, data not saved!",
                    

                ]);
        }

    }

    public function destroy($id){
        $city = City::findOrFail($id);

        $city->delete();

        return response()->json(
            [
                "message" => "data deleted!"
        ]);
    }
        
     

  
    
}
