<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function country(){
        return $this->belongsTo(Country::class);
    }
    protected $fillable = [
        'city_name',
        'street',
        'country_id',
    ];
}
