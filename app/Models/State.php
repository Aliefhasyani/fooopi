<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';
    protected $fillable = ['name','population','country_id'];

    public function country(){
        return $this->belongsTo(Country::class);
    }
    
    public function city(){
        return $this->hasMany(City::class);
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
