<?php

namespace App\Livewire\Forms;

use App\Models\VehicleReservedModel;
use Carbon\Carbon;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PemesananFormPost extends Form
{
    public $kode_pesanan;
    #[Rule(['required'])]
    public $pegawai, $driver, $persetujuan, $kendaraan, $reason, $start_date, $end_date;


    function save() {
        $this->validate();
        $cek_tanggal = VehicleReservedModel::whereDate('date_start', '>', $this->start_date)->first();
        $tanggalSekarang = Carbon::now()->format('Y-m-d');
        if ($this->start_date < $tanggalSekarang) {
            flash()->error('Tanggal jangan kurang dari tanggal sekarang.');
            return redirect('dashboard/list-pemesanan');
        }

        if ($cek_tanggal) {
            flash()->error('Terdapat pesanan lainnya.');
            return redirect('dashboard/list-pemesanan');
        }
        try {
            $pemesanan = new VehicleReservedModel;
            $pemesanan->driver_id = $this->driver;
            $pemesanan->employee_id = $this->pegawai;
            $pemesanan->vehicle_agree_id = $this->persetujuan;
            $pemesanan->vehicle_id = $this->kendaraan;
            $pemesanan->no_transaksi = $this->kode_pesanan;
            $pemesanan->date_start = $this->start_date;
            $pemesanan->date_end = $this->end_date;
            $pemesanan->reason = $this->reason;
            $pemesanan->save();
            flash()->success('Pemesanan Kendaraan Berhasil dibuat.');
            return redirect('dashboard/list-pemesanan');
        } catch (Exception $th) {
            dd($th);
        }
    }

    function kode() {
        $this->kode_pesanan = $this->generateKode();
    }

    function generateKode() {
        $tanggalSekarang = Carbon::now();
        $transaksi = VehicleReservedModel::whereDate('created_at',$tanggalSekarang)->orderBy('created_at', 'DESC')->get();
        $date = date('Ymd');
        if($transaksi->count() > 0) {
            $notransaksi = $transaksi[0]->no_transaksi;

            $lastIncrement = substr($notransaksi, 10);
            $notransaksi = str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
            return $notransaksi = 'TM'.$date.$notransaksi;
        }
        else {
            return $notransaksi = 'TM'.$date."001";

        }
    }
}
