<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
});
Route::get('/import-peserta', function () {
    return view('peserta.import');
});
Route::get('/peserta', function () {
    return view('dashboard.peserta.index');
});
Route::resource('/peserta', PesertaController::class)->only([
    'index'
]);
// Route::get('/coba', function () {
//     return view('dashboard.index');
// });

Route::post('/store', [AbsenController::class, 'store'])->name('store');
Route::post('/import-csv', [PesertaController::class, 'importCsv'])->name('import-csv');
// Route::post('/import-csv', [PesertaController::class, 'importCSV'])->name('import');
