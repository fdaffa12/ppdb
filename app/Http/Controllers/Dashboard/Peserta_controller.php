<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class Peserta_controller extends Controller
{
    public function index(){
        $title = 'Data peserta';
        $data = User::withCount('biodata_r')->orderBy('name','asc')->get();

        return view('dashboard.peserta.index',compact('title','data'));
    }

    public function diverifikasi(){
        $title = 'Data peserta yang sudah di verifikasi';
        $data = User::withCount('biodata_r')->where('is_verifikasi',1)->orderBy('name','asc')->get();

        return view('dashboard.peserta.index',compact('title','data'));
    }

    public function belum_verifikasi(){
        $title = 'Data peserta yang belum di verifikasi';
        $data = User::withCount('biodata_r')->whereNull('is_verifikasi')->orderBy('name','asc')->get();

        return view('dashboard.peserta.index',compact('title','data'));
    }
}
