<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    public function index(){
        $country = Country::all();
        
        return response()->json(
            [
                'success' => true,
                'data' => $country
                
            ]);
    }
}
