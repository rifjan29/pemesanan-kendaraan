<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersEmployeeModel extends Model
{
    use HasFactory;
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
}
