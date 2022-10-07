<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirportCon extends Model
{
    use HasFactory;

    protected $fillable = ['airport_name', 'country_name', 'country_ISO', 'latitude', 'longitude', 'country_id', 'user_id', 'image'];

    public function Country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
