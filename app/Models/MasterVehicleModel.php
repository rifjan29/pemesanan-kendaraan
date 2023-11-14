<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterVehicleModel extends Model
{
    use HasFactory;
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
}
