<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class MasterVehicleModel extends Model
{
    use HasFactory,LogsActivity;
    protected $table = 'master_vehicle';
    protected $fillable = [
        'name',
        'jenis_bahan_bakar',
        'harga',
        'merk',
        'plat_nomor',
        'jadwal_service',
        'tahun',
        'desc',
        'riwayat_pemakaian',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                ->logOnly(['name', 'harga','jenis_bahan_bakar'])
                ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")
                ->useLogName('Kendaraaan');
    }
}
