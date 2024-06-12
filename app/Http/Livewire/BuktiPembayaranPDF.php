<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\Identitas;
use Midtrans\Transaction;
use App\Models\PengajuanSewa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class BuktiPembayaranPDF extends Component
{

    public $snapToken;
    public $va_number, $gross_amount, $bank, $transaction_status, $transaction_time, $deadline, $order_id, $currency, $payment_type, $fraud_status;
    public $pengajuan_sewa;


    public function download_bukti_pembayaran($id_pengajuan_sewa)
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
            $this->pengajuan_sewa = PengajuanSewa::findOrfail($id_pengajuan_sewa);



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
            } elseif ($this->pengajuan_sewa->status_pengajuan_sewa >= 3) {
                \abort(404);
            }
        } catch (Exception $e) {
        }

        $pdf = PDF::loadView('livewire.bukti-pembayaran-p-d-f', [
            'pengajuan_sewa' => $this->pengajuan_sewa,
            'va_number' => $this->va_number,
            'bank' => $this->bank,
            'order_id' => $this->order_id,
            'currency' => $this->currency,
            'payment_type' => $this->payment_type,
            'gross_amount' => $this->gross_amount,
            'fraud_status' => $this->fraud_status,
            'transaction_time' => $this->transaction_time,
            'transaction_status' => $this->transaction_status,
        ]);
        return $pdf->download('Bukti Pembayaran ' . $this->pengajuan_sewa->id_pengajuan_sewa . '.pdf');
    }

    public function render($id_pengajuan_sewa)
    {
        $pengajuan_sewa = PengajuanSewa::findOrfail($id_pengajuan_sewa);
        return view('livewire.bukti-pembayaran-p-d-f', \compact('pengajuan_sewa'))->extends('layouts.apps')->section('content');
    }
}
