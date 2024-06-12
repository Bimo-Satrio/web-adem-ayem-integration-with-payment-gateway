<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Livewire;
use Livewire\Component;
use App\Models\Identitas;
use App\Models\PengajuanSewa;
use App\Models\Transaksi;
use Midtrans\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class BuktiPembayaran extends Component
{

    public $snapToken;
    public $va_number, $gross_amount, $bank, $transaction_status, $transaction_time, $deadline, $order_id, $currency, $payment_type, $fraud_status;
    public $pengajuan_sewa;



    public function mount($id_pengajuan_sewa)
    {

        try {
            if (!Auth::user()) {
                return redirect()->route('login');
                if (!Auth::user()->id_user) {
                    return redirect()->route('login');
                }
            }
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = env('MIDTRANS_API');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            // dapetin id pengajuan_sewa dari table
            $this->pengajuan_sewa = PengajuanSewa::findOrfail($id_pengajuan_sewa)->first();



            //jalanin pengkondisian jika sama dengan dua maka

            if ($this->pengajuan_sewa->status_pengajuan_sewa == 3) {
                //jalankan response api dibawah ini

                $status =  Transaction::status($this->pengajuan_sewa->id_pengajuan_sewa);
                $status = json_decode(json_encode($status), true);
                $this->va_number = $status['va_numbers'][0]['va_number'];
                $this->bank = $status['va_numbers'][0]['bank'];

                $this->order_id = $status['order_id'];

                $this->currency = $status['currency'];

                $this->payment_type = $status['payment_type'];

                $this->gross_amount = $status['gross_amount'];

                $this->fraud_status = $status['fraud_status'];

                $this->transaction_time = $status['transaction_time'];

                $this->transaction_status = $status['transaction_status'];
            } elseif ($this->pengajuan_sewa->status_pengajuan_sewa == 3) {
                \abort(404);
            }
        } catch (Exception $e) {
        }
    }


    public function render()
    {
        return view('livewire.bukti-pembayaran', ['pengajuan_sewa' => $this->pengajuan_sewa])
            ->extends('layouts.apps')->section('content');
    }
}
