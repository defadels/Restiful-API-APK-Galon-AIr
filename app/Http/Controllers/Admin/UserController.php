<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {

        $users = User::paginate(10);

        $title = "Halaman User";

        return view('admin.user.index',compact('users','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah data user";

        $button = "Simpan";

        $url = 'admin.user.store';

        return view('admin.user.form', compact('title','button','url'));
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

        $url = 'admin.user.update';

        return view('admin.user.form', compact('button','url','user'));
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
    public function destroy(User $user)
    {
        try {
            $nama = $user->nama;

            $user->delete();
        }catch(Exception $e) {

            return redirect()->route('admin.user')
            ->with('error',__('pesan.error', ['module' => $nama]));
        }
            return redirect()->route('admin.user')
            ->with('message',__('pesan.delete', ['module' => $nama]));
    }
}
