<?php

namespace App\Http\Controllers\Editor;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {
        $users = User::whereIn('jenis', ['user'])->paginate(10);

        $title = "Halaman User";

        return view('editor.user.index',compact('users','title'));
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
    public function edit(User $user)
    {
        $button = "Update";

        $url = 'editor.user.update';

        return view('editor.user.form', compact('button','url','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $rules = [
            'nama' => ['required','max:50'],
            'email' => ['required','unique:users,email'],
            'password' => ['required'],
            'nomor_hp' => ['required', 'regex:/^(^\+628\s?|^08)(\d{3,4}?){2}\d{2,4}$/','max:13']
        ];

        $message = [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 50 karakter',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Passowrd wajib diisi',
            'nomor_hp.required' => 'Nomor handphone wajib diisi',
            'nomor_hp.regex' => 'Format nomor handphone salah. Contoh: 082273318016',
            'nomor_hp.max' => 'Nomor handphone maksimal 13 digit',  
        ];

        
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->nomor_hp = $request->nomor_hp;
        
        if($request->has('password') && $request->password != '' ) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('editor.user')
        ->with('message',__('pesan.update',['module' => $user->nama]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $nama = $user->nama;

            $user->delete();
        }catch(Exception $e) {

            return redirect()->route('editor.user')
            ->with('error',__('pesan.error', ['module' => $nama]));
        }
            return redirect()->route('editor.user')
            ->with('message',__('pesan.delete', ['module' => $nama]));
    }
}
