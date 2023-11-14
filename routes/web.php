<?php

use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Laporan\LaporanTransaksi;
use App\Livewire\Pages\MasterData\Driver\CreateDriver;
use App\Livewire\Pages\MasterData\Driver\EditDriver;
use App\Livewire\Pages\MasterData\Driver\ListDriver;
use App\Livewire\Pages\MasterData\Pegawai\ListPegawai;
use App\Livewire\Pages\MasterData\Pegawai\CreatePegawai;
use App\Livewire\Pages\MasterData\Pegawai\EditPegawaiData;
use App\Livewire\Pages\Pemesanan\CreatePemesanan;
use App\Livewire\Pages\Pemesanan\ListPemesanan;
use App\Livewire\Pages\Pemesanan\UpdatePemesanan;
use App\Livewire\Pages\Pemesanan\UpdatePengembalian;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');



Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::prefix('dashboard')->group(function () {
        // Master Data
        Route::prefix('master-data')->group(function () {
            // Driver
            Route::get('driver',ListDriver::class)->name('list.driver');
            Route::get('driver/create',CreateDriver::class)->name('create.driver');
            Route::get('driver/edit/{id}',EditDriver::class)->name('edit.driver');
            // Pegawai
            Route::get('pegawai',ListPegawai::class)->name('list.pegawai');
            Route::get('pegawai/create',CreatePegawai::class)->name('create.pegawai');
            Route::get('pegawai/edit/{id}',EditPegawaiData::class)->name('edit.pegawai');
        });
        // Pemesanan
        Route::get('list-pemesanan',ListPemesanan::class)->name('list.pemesanan');
        Route::get('list-pemesanan/create',CreatePemesanan::class)->name('create.pemesanan');
        Route::get('list-pemesanan/update/{id}',UpdatePemesanan::class)->name('update.pemesanan');
        Route::get('list-pemesanan/update-pengembalian/{id}',UpdatePengembalian::class)->name('update.pengembalian');
        // Laporan
        Route::get('laporan',LaporanTransaksi::class)->name('list.laporan');
    });
});
// Route::prefix('dashboard')->group(function () {
//     // Route::view('URI', 'viewName');
// });
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
