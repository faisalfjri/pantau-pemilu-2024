<?php

use App\Models\PpwpTps;
use Illuminate\Support\Facades\Http;
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
    $response = Http::get("https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/0.json")->object();

    $relatedData = [];
    foreach ($response as $data) {
        $hasil = Http::get("https://sirekap-obj-data.kpu.go.id/pemilu/hhcw/ppwp/$data->kode.json")->object();

        $relatedData[] = [
            'nama' => $data->nama,
            'kode' => $data->kode,
            'chart' => $hasil->chart ?? null,
        ];
    }

    $suara_paslon_1 = collect($relatedData)->sum('chart.100025');
    $suara_paslon_2 = collect($relatedData)->sum('chart.100026');
    $suara_paslon_3 = collect($relatedData)->sum('chart.100027');

    return view('pantau', [
        'datas' => $relatedData,
        'suara_paslon_1' => $suara_paslon_1,
        'suara_paslon_2' => $suara_paslon_2,
        'suara_paslon_3' => $suara_paslon_3
    ]);
});

Route::get('/wilayah/pemilu/ppwp/{provinsi}', function ($provinsi) {
    $response = Http::get("https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/$provinsi.json")->object();
    $hasil = Http::get("https://sirekap-obj-data.kpu.go.id/pemilu/hhcw/ppwp/$provinsi.json")->object();
    $relatedData = [];

    foreach ($response as $data) {
        $relatedData[] = [
            'nama' => $data->nama,
            'kode' => $data->kode,
            'chart' => $hasil->table->{$data->kode} ?? null,
        ];
    }

    $suara_paslon_1 = collect($relatedData)->sum('chart.100025');
    $suara_paslon_2 = collect($relatedData)->sum('chart.100026');
    $suara_paslon_3 = collect($relatedData)->sum('chart.100027');

    return view('provinsi', [
        'datas' => $relatedData,
        'kode_provinsi' => $provinsi,
        'suara_paslon_1' => $suara_paslon_1,
        'suara_paslon_2' => $suara_paslon_2,
        'suara_paslon_3' => $suara_paslon_3
    ]);
})->name('provinsi');

Route::get('/pemilu/hhcw/ppwp/{provinsi}/{kabupaten}', function ($provinsi, $kabupaten) {
    $tps = PpwpTps::where('kabupaten_kota_kode', $kabupaten)->orderBy('kecamatan_nama')->orderBy('kelurahan_desa_nama')->orderBy('tps')->get();
    // $tps = PpwpTps::where('kabupaten_kota_kode', $kabupaten)->orderByDesc('suara_paslon_2')->get();
    $suara_paslon_1 = collect($tps)->sum('suara_paslon_1');
    $suara_paslon_2 = collect($tps)->sum('suara_paslon_2');
    $suara_paslon_3 = collect($tps)->sum('suara_paslon_3');


    return view('kabupaten', [
        'datas' => $tps,
        'suara_paslon_1' => $suara_paslon_1,
        'suara_paslon_2' => $suara_paslon_2,
        'suara_paslon_3' => $suara_paslon_3
    ]);
})->name('tps');
