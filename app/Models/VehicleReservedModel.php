<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class VehicleReservedModel extends Model
{
    use HasFactory,LogsActivity;
    protected $table = 'vehicle_reserved';
    protected $fillable = [
        'driver_id',
        'employee_id',
        'vehicle_id',
        'vehicle_agree_id',
        'no_transaksi',
        'desc',
        'date_start',
        'date_end',
        'reason',
        'status_reserved',
        'file',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                ->logOnly(['no_transaksi', 'date_start','date_end'])
                ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")
                ->useLogName('Pemesanan Kendaraan');
    }

    function driver() {
        return $this->belongsTo(MasterDriverModel::class,'driver_id');
    }
    function employee(){
        return $this->belongsTo(UsersEmployeeModel::class,'employee_id')->with('user');
    }
    function vehicle(){
        return $this->belongsTo(MasterVehicleModel::class,'vehicle_id');
    }
    function vehicleAgre(){
        return $this->belongsTo(UsersEmployeeModel::class,'vehicle_agree_id');
    }

    function vehicleReturn() {
        return $this->belongsTo(VehicleReturn::class,'id','vehicle_reserved_id');
    }


}
