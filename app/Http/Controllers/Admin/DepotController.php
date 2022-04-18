<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\User;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class DepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Halaman depot';

        $daftar_depot = User::where('jenis','depot')->paginate(10);
        
        return view('admin.depot.index',compact('title','daftar_depot'));
    }

    public function orderan(User $depot){
        $title = 'Masukkan orderan';

        $url = 'admin.pesanan.store';

        $button = 'Order';

        return view('admin.depot.order',compact('depot','button','url','title'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Halaman tambah depot';

        $url = 'admin.depot.store';

        $button = 'Simpan';

        return view('admin.depot.form',compact('title','url','button'));
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
            'harga_ambil' => ['numeric','required','min:0'],
            'harga_jemput' => ['numeric','required','min:0'],
            'foto' => ['file','mimes:jpeg,png','max:10240']
        ];

        $message = [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 50 karakter',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Passowrd wajib diisi',
            'nomor_hp.required' => 'Nomor handphone wajib diisi',
            'nomor_hp.regex' => 'Format nomor handphone salah. Contoh: 082273318016',
            'nomor_hp.max' => 'Nomor handphone maksimal 13 digit',  
            'harga_ambil.required' => 'Harga ambil harus terisi',
            'harga_ambil.numeric' => 'Harga ambil harus bernilai angka',
            'harga_jemput.required' => 'Harga jemput harus terisi',
            'harga_jemput.numeric' => 'Harga jemput harus bernilai angka',
            'foto.file' => 'Logo harus berupa file gambar',
            'foto.mimes' => 'Gambar logo harus berformat .jpg dan .png',
            'foto.max' => 'Ukuran file logo maksimal 1Mb'
        ];

        $validate = Validator::make($input, $rules, $message)->validate();

        $depot = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'harga_ambil' => $request->harga_ambil,
            'harga_jemput' => $request->harga_jemput,
            'password' => Hash::make($request->password),
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'jenis' => "depot",
            'status' => "aktif"
        ]);

        if($request->hasFile('foto')) {
            $nama_file = Str::uuid();

            $path = 'depot/logo/'; 
            $file_extension = $request->foto->extension();
            $depot->foto = $path.$nama_file.".".$file_extension;
            
            $gambar = $request->file('foto');
            $destinationPath = storage_path('/app/public/');

            $img = Image::make($gambar->path());
            $img->fit(1000, 1000, function ($cons) {
                $cons->aspectRatio();
            })->save($destinationPath.$depot->foto);

         
            
            $depot->save();
            
        }
        

        return redirect()->route('admin.depot')
        ->with('message',__('pesan.create',['module'=>$depot->nama]));
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
    public function edit(User $depot)
    {
        $title = 'Edit data depot';

        $button = 'Update';

        $url = 'admin.depot.update';

        return view('admin.depot.form',compact('title','depot','button','url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $depot)
    {
        $input = $request->all();

        $rules = [
            'nama' => ['required','max:50'],
            'email' => ['required','unique:users,email,'.$depot->id],
            'nomor_hp' => ['required', 'regex:/^(^\+628\s?|^08)(\d{3,4}?){2}\d{2,4}$/','max:13'],
            'harga_ambil' => ['numeric','required','min:0'],
            'harga_jemput' => ['numeric','required','min:0'],
            'foto' => ['file','mimes:jpeg,png','max:10240']
        ];

        $message = [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 50 karakter',
            'email.required' => 'Email wajib diisi',
            'nomor_hp.required' => 'Nomor handphone wajib diisi',
            'nomor_hp.regex' => 'Format nomor handphone salah. Contoh: 082273318016',
            'nomor_hp.max' => 'Nomor handphone maksimal 13 digit',  
            'harga_ambil.required' => 'Harga ambil harus terisi',
            'harga_jemput.required' => 'Harga jemput harus terisi',
            'foto.file' => 'Logo harus berupa file gambar',
            'foto.mimes' => 'Gambar logo harus berformat .jpg dan .png',
            'foto.max' => 'Ukuran file logo maksimal 1Mb',
        ];

        $validate = Validator::make($input, $rules, $message)->validate();

        $depot->nama = $request->nama;
        $depot->email = $request->email;
        $depot->nomor_hp = $request->nomor_hp;
        $depot->harga_ambil = $request->harga_ambil;
        $depot->harga_jemput = $request->harga_jemput;
        $depot->alamat = $request->alamat;
        
        if($request->has('password') && $request->password != '' ) {
            $depot->password = Hash::make($request->password);
        }

        if($request->hasFile('foto')) {

            $old_logo = $depot->foto;

            $nama_file = Str::uuid();

            $path = 'depot/logo/'; 
            $file_extension = $request->foto->extension();
            $depot->foto = $path.$nama_file.".".$file_extension;
             
            $gambar = $request->file('foto');
            $destinationPath = storage_path('/app/public/');

            $img = Image::make($gambar->path());
            $img->fit(1000, 1000, function ($cons) {
                $cons->aspectRatio();
            })->save($destinationPath.$depot->foto);

            Storage::disk('public')->delete($old_logo);
        }
        
        $depot->save();
        dd($depot);

        return redirect()->route('admin.depot')
        ->with('message',__('pesan.update',['module'=>$depot->nama]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $depot)
    {
        try{
            $nama = $depot->nama;

            Storage::disk('public')->delete($depot->foto);
            
            $depot->delete();

        }catch(Exception $e) {
            return redirect()->route('admin.depot')
            ->with('message',__('pesan.error',['module' => $nama]));
        }
            return redirect()->route('admin.depot')
            ->with('message',__('pesan.delete',['module' => $nama]));
    }
}
