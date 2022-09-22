<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $fillable = ['airline_name','country_name', 'country_ISO', 'country_id'];

    public function Country(){
        return $this->hasMany(Country::class, 'country_id', 'id');
    }
}
