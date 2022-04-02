<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Halaman data karyawan';

        $users = User::whereIn('jenis',['admin','editor'])->latest()->paginate(10);

        return view('admin.karyawan.index',compact('users','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah data Karyawan";

        $button = "Simpan";

        $url = 'admin.karyawan.store';

        $daftar_jenis = [
            'admin' => 'Admin',
            'editor' => 'Editor'
        ];

        return view('admin.karyawan.form', compact('title','button','url','daftar_jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'nama' => ['required','max:50'],
            'email' => ['required','unique:users,email'],
            'password' => ['required'],
            'nomor_hp' => ['required', 'regex:/^(^\+628\s?|^08)(\d{3,4}?){2}\d{2,4}$/','max:13'],
            'jenis' => ['required']
        ];

        $message = [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 50 karakter',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Passowrd wajib diisi',
            'nomor_hp.required' => 'Nomor handphone wajib diisi',
            'nomor_hp.regex' => 'Format nomor handphone salah. Contoh: 082273318016',
            'nomor_hp.max' => 'Nomor handphone maksimal 13 digit',
            'jenis.required' => 'Jenis user wajib dipilih'  
        ];

        $validate = Validator::make($input, $rules, $message)->validate();

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_hp' => $request->nomor_hp,
            'jenis' => $request->jenis,
        ]);

        $nama = $user->nama;

        return redirect()->route('admin.karyawan')->with('message',__('pesan.create', ['module' => $nama]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $button = "Update";

        $url = 'admin.user.update';

        return view('admin.karyawan.form', compact('button','url','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
