<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Exports\PesertaExport;
use App\Imports\PesertasImport;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesertas = Peserta::all();
        $pesertas_hadir = Peserta::where('present', '=', 1);
        $peserta10 = Peserta::where('session', '=', '2024-08-10');
        $peserta10_hadir = Peserta::where('session', '=', '2024-08-10')->where('present', '=', 1);
        $peserta11 = Peserta::where('session', '=', '2024-08-11');
        $peserta11_hadir = Peserta::where('session', '=', '2024-08-11')->where('present', '=', 1);
        return view('dashboard.peserta.index', [
            'pesertas' => $pesertas,
            'total_peserta' => $pesertas->count(),
            'total_peserta_hadir' => $pesertas_hadir->count(),
            'total_peserta10' => $peserta10->count(),
            'total_peserta10_hadir' => $peserta10_hadir->count(),
            'total_peserta11' => $peserta11->count(),
            'total_peserta11_hadir' => $peserta11_hadir->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Peserta::create([
            'name' => $request->name,
            'email' => $request->email,
            'no' => $request->no,
            'education' => $request->education,
            'session' => $request->session,
            'present' => $request->present,
            'present_time' => Carbon::now(),
        ]);

        return redirect('/peserta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Peserta $pesertum)
    {
        return view('dashboard.peserta.edit', [
            'peserta' => $pesertum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peserta $pesertum)
    {
        // dd($pesertum);
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'no' => 'required',
            'education' => 'required',
            'session' => 'required',
            'present' => 'required',
        ];

        $validatedData = $request->validate($rules);
        Peserta::where('id', $pesertum->id)->update($validatedData);

        return redirect('/peserta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peserta $pesertum)
    {
        Peserta::destroy($pesertum->id);
        return redirect('/peserta');
    }

    public function importCsv(Request $request)
    {
        // dd($request->file('import_csv'));
        Excel::import(new PesertasImport, $request->file('import_csv'));

        return redirect('/peserta')->with('success', 'All good!');
    }

    public function export()
    {
        return Excel::download(new PesertaExport, 'data_hadir_peserta.xlsx');
        return redirect('/peserta');
    }
}
