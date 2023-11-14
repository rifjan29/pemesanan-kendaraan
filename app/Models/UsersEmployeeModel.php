<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
class UsersEmployeeModel extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'users_employee';
    protected $fillable = [
        'users_id',
        'no_telp',
        'jabatan',
        'status',
    ];
    function user(){
        return $this->belongsTo(User::class,'users_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                ->logOnly(['users_id', 'no_telp','jabatan','status'])
                ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")
                ->useLogName('Pegawai');
    }
}
