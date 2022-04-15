<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Image;
use Storage;
use Hash;
use Str;


class ProfileController extends Controller
{
    public function show(User $profile) {
        $profile = Auth::user();

        return view('editor.profile.show',compact('profile'));
    }

    public function edit(User $profile) {
        $profile = Auth::user();

        $url = 'editor.profile.update';

        $button = 'Update';
        
        return view('editor.profile.edit',compact('profile','url','button'));
    }

    public function update(Request $request, User $profile) {

        $input = $request->all();

        $rules = [
            'nama' => ['required','max:50'],
            'email' => ['required','unique:users,email,'.$profile->id],
            'nomor_hp' => ['required', 'regex:/^(^\+628\s?|^08)(\d{3,4}?){2}\d{2,4}$/','max:13'],
            'foto' => ['file','mimes:jpeg,png','max:10240'],
            'alamat' => ['max:500']
        ];

        $message = [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 50 karakter',
            'email.required' => 'Email wajib diisi',
            'nomor_hp.required' => 'Nomor handphone wajib diisi',
            'nomor_hp.regex' => 'Format nomor handphone salah. Contoh: 082273318016',
            'nomor_hp.max' => 'Nomor handphone maksimal 13 digit',
            'foto.file' => 'Foto harus berupa file gambar',
            'foto.mimes' => 'Gambar foto harus berformat .jpg dan .png',
            'foto.max' => 'Ukuran file foto maksimal 1Mb',
            'alamat.max' => 'Alamat maksimal 500 karakter'
        ];

        $validate = Validator::make($input, $rules, $message)->validate();

        $profile->nama = $request->nama;
        $profile->email = $request->email;
        $profile->nomor_hp = $request->nomor_hp;
        $profile->alamat = $request->alamat;
        
        if($request->has('password') && $request->password != '' ) {
            $profile->password = Hash::make($request->password);
        }

        if($request->hasFile('foto')) {
            
            $foto_lama = $profile->foto;

            $nama_foto = Str::uuid();

            $path = 'user/foto/';
            $file_extension = $request->foto->extension(); 
            $profile->foto = $path.$nama_foto.".".$file_extension;

            $foto_profil = $request->file('foto');
            $letak_file = storage_path('/app/public/');

            $img = Image::make($foto_profil->path());
            $img->fit(200, 200, function($cons){
                $cons->aspectRatio();
            })->save($letak_file.$profile->foto);

            Storage::disk('public')->delete($foto_lama);
        }

        $profile->save();

        return redirect()->route('editor.profile.show',$profile->id)
        ->with('message',__('pesan.update',['module' => $profile->nama]));
    }
}
