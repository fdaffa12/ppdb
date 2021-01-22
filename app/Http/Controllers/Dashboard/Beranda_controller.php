<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Biodata;

class Beranda_controller extends Controller
{
    public function index(){
        $title = 'Halaman Dashboard';

        $user_id = \Auth::user()->id;

        $cek = Biodata::where('users',$user_id)->count();
        if($cek < 1){
            $pesan = 'Harap Melengkapi Biodata Terlebih Dahulu';
        }else{
            $pesan = 'Biodata Anda Sudah Dilengkapi.. Terima Kasih';
        }

        return view('dashboard.beranda.index',compact('title','pesan','cek'));
    }
}
