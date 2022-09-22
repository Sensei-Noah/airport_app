<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirportCon extends Model
{
    use HasFactory;

    protected $fillable = ['airport_name', 'country_name', 'country_ISO', 'latitude', 'longitude', 'country_id'];

    public function Country(){
        return $this->hasMany(Country::class, 'country_id', 'id');
    }
}
