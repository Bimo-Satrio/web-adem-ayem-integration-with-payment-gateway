<?php

namespace App\Http\Livewire;


use Midtrans\Snap;
use Midtrans\Config;
use Livewire\Component;
use App\Models\Tagihan_penghuni;
use Midtrans\Transaction;
use Illuminate\Support\Facades\Auth;


class HandlingUserPayments extends Component
{
    public $snapToken;
    public $va_number, $gross_amount, $bank, $transaction_status, $transaction_time, $deadline, $user;
    public $tagihan_penghuni = [];


    public function mount($id_tagihan_penghuni)
    {
        if (!Auth::user()) {
            return redirect()->to('/');

            if (!Auth::user()->id) {
                return redirect()->to('/');
            }
        } else {

            $this->user =  Auth::user()->id;
        }

        // Set your Merchant Server Key
        Config::$serverKey = env('MIDTRANS_API');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        if (isset($_GET['ambil'])) {
            $current_status = json_decode($_GET['ambil'], true);

            $order_id = $current_status["order_id"];
            $this->tagihan_penghuni = Tagihan_penghuni::with('penghuni.transaksi.kontrakan')->where('id_tagihan_penghuni', $order_id)->first();
            $this->tagihan_penghuni->penghuni->status_tagihan = 1;
            $this->tagihan_penghuni->status_pembayaran_tagihan = 1;
            $this->tagihan_penghuni->penghuni->save();
            $this->tagihan_penghuni->update();
        } else {
            $this->tagihan_penghuni =
                Tagihan_penghuni::with('penghuni.transaksi.kontrakan')->find($id_tagihan_penghuni);
        }


        if (!empty($this->tagihan_penghuni)) {
            if ($this->tagihan_penghuni->status_pembayaran_tagihan == 0) {
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $this->tagihan_penghuni->id_tagihan_penghuni,
                        'gross_amount' => $this->tagihan_penghuni->penghuni->transaksi->kontrakan->harga * $this->tagihan_penghuni->penghuni->transaksi->lamaHuni->bulan,
                    ),
                    'customer_details' => array(
                        'first_name' => Auth::user()->name,
                        'last_name' => 'pratama',
                        'email' => Auth::user()->email,
                        'phone' => '08111222333',
                    ),
                );
                $this->snapToken = Snap::getSnapToken($params);
            } else if ($this->tagihan_penghuni->status_pembayaran_tagihan == 1) {
                $status =  Transaction::status($this->tagihan_penghuni->id_tagihan_penghuni);
                $status = json_decode(json_encode($status), true);

                $this->va_number = $status['va_numbers'][0]['va_number'];
                $this->gross_amount = $status['gross_amount'];
                $this->bank = $status['va_numbers'][0]['bank'];
                $this->transaction_status = $status['transaction_status'];
                $transaction_time = $status['transaction_time'];
                $this->deadline = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));
            }
        }
    }

    public function render()
    {

        return view('livewire.handling-user-payments')
            ->extends('layouts.apps')->section('content');
    }
}
