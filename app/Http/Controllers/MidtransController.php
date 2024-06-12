<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Identitas;
use App\Models\Tagihan_penghuni;
use App\Models\PengajuanSewa;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MidtransController extends Controller
{

    public function payments($id_pengajuan_sewa)
    {


        $pengajuan_sewa = Identitas::join('pengajuan_sewa', 'identitas.id_pengajuan_sewa', '=', 'pengajuan_sewa.id_pengajuan_sewa')->where('pengajuan_sewa.id_pengajuan_sewa', $id_pengajuan_sewa)->first();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_API', null);
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pengajuan_sewa->id_pengajuan_sewa,
                'gross_amount' => $pengajuan_sewa->harga_unit_kontrakan_total * intval($pengajuan_sewa->lama_huni_unit_kontrakan),
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->no_telefon,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('payments', compact('pengajuan_sewa', 'snapToken'));
    }
    public function paymentsTagihan($id_tagihan_penghuni)
    {
        try {
            $tagihan = Tagihan_penghuni::with(['penghuni.pengajuan_sewa'])->where('id_tagihan_penghuni', $id_tagihan_penghuni)->first();
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = env('MIDTRANS_API', null);
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $tagihan->id_tagihan_penghuni,
                    'gross_amount' => $tagihan->penghuni->pengajuan_sewa->harga_unit_kontrakan * intval($tagihan->penghuni->tagihan_lama_huni),
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->no_telefon,
                ),
            );
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return view('paymentsTagihan', compact('tagihan', 'snapToken'));
        } catch (Exception $e) {
            \abort(404);
        }
    }


    public function callback(Request $request)
    {
        try {
            $serverKey = env('MIDTRANS_API', null);
            $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
            if ($hashed == $request->signature_key) {
                $pengajuan_sewa = PengajuanSewa::find($request->order_id);
                $pengajuan_sewa->update(['status_pengajuan_sewa' => $request->transaction_status == 'settlement' ? 5 : ($request->transaction_status == 'pending' ? 3 : ($request->transaction_status == 'deny' ? 4 : ($request->transaction_status == 'expire' ? 6 : ($request->transaction_status == 'cancel' ? 7 : $pengajuan_sewa->status_pengajuan_sewa))))]);
            } else {
                $pengajuan_sewa = PengajuanSewa::find($request->order_id);
                $pengajuan_sewa->update(['status_pengajuan_sewa' => $hashed == null || $hashed == 0 ? 100 : $pengajuan_sewa->status_pengajuan_sewa]);
            }
        } catch (Exception $e) {
            \abort(500);
        }
    }
}
