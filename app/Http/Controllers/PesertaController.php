<?php

namespace App\Http\Controllers;

use App\Imports\PesertasImport;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    public function importCsv(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'import_csv' => 'required|mimes:csv',
        // ]);
        Excel::import(new PesertasImport, $request->file('import_csv'));

        return redirect('/')->with('success', 'All good!');
    }
    // public function importCSV(Request $request)
    // {
        // $request->validate([
        //     'import_csv' => 'required|mimes:csv',
        // ]);
        //read csv file and skip data
        // $file = $request->file('import_csv');
        // $handle = fopen($file->path(), 'r');
        // dd($request);

        //skip the header row
    //     fgetcsv($handle);

    //     $chunksize = 10;
    //     while (!feof($handle)) {
    //         $chunkdata = [];

    //         for ($i = 0; $i < $chunksize; $i++) {
    //             $data = fgetcsv($handle);
    //             if ($data === false) {
    //                 break;
    //             }
    //             $chunkdata[] = $data;
    //         }

    //         $this->getchunkdata($chunkdata);
    //     }
    //     fclose($handle);

    //     return redirect()->route('employee.create')->with('success', 'Data has been added successfully.');
    // }

    // public function getchunkdata($chunkdata)
    // {
    //     foreach ($chunkdata as $column) {
    //         $name = $column[0];
            // $email = $column[2];
            // $no = $column[3];
            // $education = $column[4];

            //create new employee
            // $peserta = new Peserta();
            // $peserta->name = $name;
            // $peserta->email = $email;
            // $peserta->no = $no;
            // $peserta->education = $education;
    //         $peserta->save();
    //     }
    // }


}
