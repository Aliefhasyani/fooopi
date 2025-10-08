<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressessController extends Controller
{
    public function index(){
        $addressess = Address::with(['country','state','city','user'])->get();

        return response()->json(
            [
                "addressess" => $addressess
            ]);
    }
}
