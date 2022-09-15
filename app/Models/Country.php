<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['country_name', 'country_ISO'];

    public function AirportCon(){
        return $this->hasMany(AirportCon::class, 'country_ISO', 'country_ISO');
    }

    public function Airline(){
        return $this->hasMany(Airline::class, 'country_ISO', 'country_ISO');
    }
}
