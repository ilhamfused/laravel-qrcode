<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\VarDumper;

class AbsenController extends Controller
{
    public function store(Request $request)
    {
        $request_split = explode(',', $request->name);
        $name = trim(strtoupper($request_split[0]));
        // $hari = $request_split[1];
        $peserta_terdaftar = Peserta::where('name', '=', $name)->first();
        // dd($peserta_terdaftar->presensi()->exists());
        // return;
        if ($peserta_terdaftar !== null) {
            // user found
            if ($peserta_terdaftar->presensi()->exists()) {
                return redirect('/')->with('terpakai', 'Nama anda sudah terpakai');
            } else {
                Presensi::create([
                    'name' => $name,
                    'peserta_id' => $peserta_terdaftar->id
                ]);

                return redirect('/')->with('success', 'Silahkan Masuk');
            }
        } else {
            return redirect('/')->with('fail', 'Nama anda tidak terdaftar');
        }
        // $validate = Validator::make($request->all(), [
        //     "name" => "unique:presensis",
        // ]);
        // if ($validate->fails()) {
        //     return redirect('/')->with('fail', 'Nama anda sudah terdaftar');
        // }
        return;
    }
}
