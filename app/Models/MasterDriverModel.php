<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class MasterDriverModel extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'master_driver';
    protected $fillable = [
        'users_id',
        'name',
        'desc',
        'no_telp',
        'status',
    ];

    function user() {
        return $this->belongsTo(User::class,'users_id');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                ->logOnly(['name', 'desc','no_telp'])
                ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")
                ->useLogName('Driver');
    }

}
