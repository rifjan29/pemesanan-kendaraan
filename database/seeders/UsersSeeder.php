<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UsersEmployeeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nameUser = ['admin','pihak'];
        $namePegawai = ['admin','pegawai','manager'];

        for ($i=0; $i < count($nameUser) ; $i++) {
            $role = new Role;
            $role->name = $nameUser[$i];
            $role->save();
        }
        for ($j=0; $j < count($namePegawai) ; $j++) {
            $user = new User;
            $user->name = $namePegawai[$j];
            $user->email = $namePegawai[$j].'@mail.com';
            $user->password = Hash::make('password');
            $user->save();
            if ($namePegawai[$j] != 'admin') {
                $pegawai = new UsersEmployeeModel;
                $pegawai->users_id = $user->id;
                $pegawai->no_telp = '0912513';
                $pegawai->jabatan = $namePegawai[$j];
                $pegawai->save();
                $permissions = Permission::pluck('id','id')->all();
                $role->syncPermissions($permissions);
                $user->assignRole('pihak');
            }else{
                $permissions = Permission::pluck('id','id')->all();
                $role->syncPermissions($permissions);
                $user->assignRole('admin');
            }
        }

    }
}
