<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkingslots extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'location_id',
        'category'
];
}
