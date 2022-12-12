<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkingLocation extends Model
{
    use HasFactory;

protected $fillable=[
    'name',
'Available_spot',
'Price_per_hourly'
];

}
