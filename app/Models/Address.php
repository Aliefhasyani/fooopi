<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addressess';
    protected $fillable = ['name','country_id','state_id','city_id','user_id'];

    public function country(){
        return $this->belongsTo(Country::class); 
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
