<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Image;
use Storage;
use Hash;

class ProfileController extends Controller
{
    public function show(User $profile) {

        return view('admin.profile.show',compact('profile'));
    }

    public function edit(User $profile) {

        $url = 'admin.profile.update';

        $button = 'Update';
        
        return view('admin.profile.edit',compact('profile','url','button'));
    }

    public function update(Request $request, User $profile) {
        $input = $request->all();


        $validate = Validator::make($input, $rules, $message)->validate();

        return redirect()->route('admin.profile.show')
        ->with('message',__('pesan.update',['module' => $profile->nama]));
    }
}
