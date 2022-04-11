<?php

namespace App\Http\Controllers\User;

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

        return view('user.profile.show',compact('profile'));
    }

    public function edit(User $profile) {
        
        return view('user.profile.edit',compact('profile'));
    }
}
