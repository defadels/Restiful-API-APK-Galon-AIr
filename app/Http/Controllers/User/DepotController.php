<?php

namespace App\Http\Controllers\User;

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
    public function index()
    {
        $title = 'Halaman depot';

        $daftar_depot = User::where('jenis','depot')->paginate(10);
        
        return view('user.depot.index',compact('title','daftar_depot'));
    }

    public function orderan(User $depot){
        $title = 'Masukkan orderan';

        $url = 'user.pesanan.store';

        $button = 'Order';

        return view('user.depot.order',compact('depot','button','url','title'));
    }

}
