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


class ProfileController extends Controller
{
    public function show(User $profile) {

        return view('editor.profile.show',compact('profile'));
    }

    public function edit(User $profile) {

        $url = 'editor.profile.update';

        $button = 'Update';
        
        return view('editor.profile.edit',compact('profile','url','button'));
    }


}
