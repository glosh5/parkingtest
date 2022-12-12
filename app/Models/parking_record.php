<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parking_record extends Model
{
    use HasFactory;
    protected $fillable=[
        'checkin',
        'vehicle_id',
        'splot_id',
        'checkout',
        'fees',
        'recordedBy',
        'status'
    ];
}
