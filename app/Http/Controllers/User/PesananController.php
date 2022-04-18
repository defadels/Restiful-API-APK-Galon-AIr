<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Pesanan;
use Validator;
use Str;
use Carbon\Carbon;
use Auth;

class PesananController extends Controller
{
    public function index() {
        $orderan = Pesanan::where('status','masuk')->where('dibuat_oleh_id', Auth::user()->id)->paginate(10);

        $description = "Daftar orderan yang masuk";

        return view('user.pesanan.masuk.index',compact('orderan','description'));
    }

    public function store(Request $request, User $depot){
        $input = $request->all();

        $rules = [
            'jumlah' => 'numeric',
        ];

        $message = [
            'jumlah.numeric' => 'Jumlah barang harus berupa angka'
        ];

        $validate = Validator::make($input, $rules, $message)->validate();

        $sekarang = Carbon::now();

        $transaksi = 'INV/'.$sekarang->format('ymd').
        '/'.$sekarang->format('his').'/'.Str::upper(Str::random(6));

        $pesanan = Pesanan::create([
            'total' => $request->total,
            'tanggal' => Carbon::now(),
            'no_transaksi' => $request->transaksi = $transaksi,
            'status' => 'masuk',
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
            'dibuat_oleh_id' => Auth::user()->id,
            'depot_id' => $depot->id

        ]);

        return redirect()->route('user.pesanan')
        ->with('message',__('pesan.create', ['module' => $pesanan->no_transaksi]));
    }


}
