<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\User;
use Validator;
use Illuminate\Support\Str;
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
        
        return view('editor.depot.index',compact('title','daftar_depot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $url = 'editor.depot.update';

        return view('editor.depot.form',compact('title','depot','button','url'));
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
            'email' => ['required','unique:users,email'],
            'nomor_hp' => ['required', 'regex:/^(^\+628\s?|^08)(\d{3,4}?){2}\d{2,4}$/','max:13'],
            'harga_ambil' => ['numeric','required','min:0'],
            'harga_jemput' => ['numeric','required','min:0'],
            'logo' => ['file','mimes:jpeg,png','max:10240'],
            'alamat' => ['required','max:500']
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
            'logo.file' => 'Logo harus berupa file gambar',
            'logo.mimes' => 'Gambar logo harus berformat .jpg dan .png',
            'logo.max' => 'Ukuran file logo maksimal 1Mb',
            'alamat.required' => 'Alamat depot wajib diisi',
            'alamat.max' => 'Alamat maksimal 500 karakter'
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

        return redirect()->route('editor.depot')
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
            return redirect()->route('editor.depot')
            ->with('message',__('pesan.error',['module' => $nama]));
        }
            return redirect()->route('editor.depot')
            ->with('message',__('pesan.delete',['module' => $nama]));
    }
}
