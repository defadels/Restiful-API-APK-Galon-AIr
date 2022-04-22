<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pesanan;

class APIController extends Controller
{
    public function get_all_user() {
        $daftar_user = User::where('jenis','user')->get();

        $hasil = array($daftar_user);

        return response()->json($daftar_user,200);
    }

    public function insert_data_user(Request $request) {
        $insert_user = new User;
        $insert_user->nama = $request->nama;
        $insert_user->email = $request->email;
        $insert_user->password = $request->password;
        $insert_user->nomor_hp = $request->nomor_hp;
        $insert_user->jenis = $request->jenis;
        $insert_user->alamat = $request->alamat;

        $insert_user->save();

        return response([
            'status' => 'OK',
            'message' => 'Data User Disimpan',
            'data' => $insert_user
        ], 200);
    }

    public function update_data_user(Request $request, $id){
        $check_user = User::firstwhere('id', $id);
        if($check_user){
            $data_user = User::find($id);
            $data_user->nama = $request->nama;
            $data_user->email = $request->email;
            $data_user->password = $request->password;
            $data_user->nomor_hp = $request->nomor_hp;
            $data_user->jenis = $request->jenis;
            $data_user->alamat = $request->alamat;

            $data_user->save();

            return response([
                'status' => 'OK',
                'message' => 'Data User Disimpan',
                'update-data' => $data_user
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Data User Tidak Ditemukan',
            ], 404);
        }
    }

    public function get_all_order() {
        return response()->json(Pesanan::all(),200);
    }

    public function order_masuk() {

        $order_masuk = Pesanan::where('status','masuk')->get();

        return response()->json($order_masuk,200);
    }

    public function order_proses() {

        $order_proses = Pesanan::where('status','diproses')->get();

        return response()->json($order_proses,200);
    }
    
    public function order_kirim() {

        $order_kirim = Pesanan::where('status','dikirim')->get();

        return response()->json($order_kirim,200);
    }
    
    public function order_batal() {

        $order_batal = Pesanan::where('status','batal')->get();

        return response()->json($order_batal,200);
    }
    
    public function order_selesai() {

        $order_selesai = Pesanan::where('status','selesai')->get();

        return response()->json($order_selesai,200);
    }

    public function get_user_order(Request $request, $dibuat_oleh_id){
        $orderan_user = Pesanan::where('dibuat_oleh_id', $dibuat_oleh_id)->get();

        return response()->json($orderan_user,200);
    }
    
    public function get_process_order(Request $request, $diproses_oleh_id){
        $orderan_user = Pesanan::where('diproses_oleh_id', $diproses_oleh_id)->get();

        return response()->json($orderan_user,200);
    }

    public function get_all_depot() {
        $daftar_depot = User::where('jenis','depot')->get();
        
        return response()->json($daftar_depot,200);
    }
    
    public function get_all_editor() {
        $daftar_editor = User::where('jenis','editor')->get();

        return response()->json($daftar_editor,200);
    }
}
