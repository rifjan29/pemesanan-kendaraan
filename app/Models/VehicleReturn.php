<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleReturn extends Model
{
    use HasFactory;
    protected $table = 'vehicle_return';
    protected $fillable = [
        'vehicle_reserved_id',
        'return_status',
        'file',
        'desc',
    ];
}
