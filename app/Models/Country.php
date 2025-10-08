<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    protected $fillable = ['name','population'];


    public function states(){
        return $this->hasMany(State::class);
    }

    public function addressess(){
        return $this->hasMany(Address::class);
    }
}
