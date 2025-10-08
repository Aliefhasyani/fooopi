<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class City extends Model
{
    protected $table = 'city';

    protected $fillable = ['name','state_id','country_id'];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }
    
    public function addressess(){
        return $this->hasMany(Address::class);
    }
}
