<?php

namespace Database\Seeders;

use App\Models\MasterDriverModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $driver = new MasterDriverModel;
        $driver->users_id = 1;
        $driver->name = 'Tony Chuse';
        $driver->desc = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium ipsam odio maiores vel, incidunt ut eveniet sapiente corporis. Consectetur necessitatibus perferendis deserunt ea eum, pariatur voluptates aperiam accusamus corporis asperiores.';
        $driver->no_telp = '12515';
        $driver->status = 'aktif';
        $driver->save();
    }
}
