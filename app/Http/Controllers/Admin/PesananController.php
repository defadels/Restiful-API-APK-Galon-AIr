<?php

namespace App\Http\Controllers\Admin;

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
        $orderan = Pesanan::where('status','masuk')->paginate(10);

        $description = "Daftar orderan yang masuk";

        return view('admin.pesanan.masuk.index',compact('orderan','description'));
    } 

    public function masuk_edit(Pesanan $orderan, User $depot){
        $title = 'Edit orderan';

        $url = 'admin.pesanan.store';

        $button = 'Update';

        return view('admin.pesanan.masuk.form',compact('depot','button','url','title','orderan'));
    }

    public function masuk_show(Pesanan $orderan, User $depot) {
        $title = 'Lihat orderan';

        $url = 'admin.pesanan.update';

        $button = 'Proses';

        return view('admin.pesanan.masuk.show',compact('depot','button','url','title','orderan'));
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

        return redirect()->route('admin.pesanan')
        ->with('message',__('pesan.create', ['module' => $pesanan->no_transaksi]));
    }

    public function proses() {
        $orderan = Pesanan::where('status','diproses')->paginate(10);

        $description = "Daftar orderan yang diproses";

        return view('admin.pesanan.proses.index',compact('orderan','description'));
    }

    public function update(Request $request, Pesanan $orderan) {
        $input = $request->all();

        $rules = [
            'status' => 'nullable',
            'diproses_oleh_id' => 'nullable'
        ];

        $message = [
            'status.nullable' => 'Status wajib diisi',
            'diproses_oleh_id.nullable' => 'User yang memproses wajib diisi'
        ];

        $validate = Validator::make($input, $rules, $message)->validate();

        $orderan->status = 'diproses';
        $orderan->diproses_oleh_id = Auth::user()->id;

        $orderan->save();
        
        return redirect()->route('admin.pesanan.proses')
        ->with('message',__('pesan.update', ['module' => $orderan->no_transaksi]));
    }

    public function antar() {
        $orderan = Pesanan::where('status','dikirim')->paginate(10);

        $description = "Daftar orderan yang dikirim";

        return view('admin.pesanan.dikirim.index',compact('orderan','description'));
    }

    public function batal() {
        $orderan = Pesanan::where('status','batal')->paginate(10);

        $description = "Daftar orderan yang batal";

        return view('admin.pesanan.batal',compact('orderan','description'));
    }
    
    public function selesai() {
        $orderan = Pesanan::where('status','selesai')->paginate(10);

        $description = "Daftar orderan yang selesai";

        return view('admin.pesanan.selesai',compact('orderan','description'));
    }
}
