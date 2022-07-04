<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        return Pasien::all();
    }

    public function store()
    {
        request()->validate([
            'NOPASIEN'=> 'required',
            'NAMAPASIEN'=> 'required',
            'TMPLAHIR'=> 'required',
            'TGLLAHIR'=> 'required',
            'ALAMAT'=> 'required',
        ]);

        return Pasien::create([
            'NOPASIEN' => request('NOPASIEN'),
            'NAMAPASIEN' => request('NAMAPASIEN'),
            'TMPLAHIR' => request('TMPLAHIR'),
            'TGLLAHIR' => request('TGLLAHIR'),
            'ALAMAT' => request('ALAMAT'),
        ]);
    }

    public function show()
    {
        $pasien = Pasien::all();
        return view('pasien', ['pasien'=>$pasien]);
    }
}
