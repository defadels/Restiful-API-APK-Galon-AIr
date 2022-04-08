<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Depot;
use Validator;

class DepotController extends Controller
{
    public function index()
    {
        $title = 'Halaman depot';

        $daftar_depot = Depot::paginate(10);
        
        return view('user.depot.index',compact('title','daftar_depot'));
    }


}
