<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => "unique:presensis",
        ]);
        if ($validate->fails()) {
            return redirect('/')->with('fail', 'Nama anda sudah terdaftar');
        }

        Presensi::create([
            'name' => $request->name
        ]);

        return redirect('/')->with('success', 'Silahkan Masuk');
    }
}
