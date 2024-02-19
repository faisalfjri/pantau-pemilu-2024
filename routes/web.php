<?php

use App\Models\PpwpTps;
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
    return view('welcome');
});

Route::get('/test', function () {
    // $test = PpwpTps::where('kabupaten_kota_kode', '1106')->orderBy('kelurahan_desa_kode')->orderBy('tps')->get();
    $test = PpwpTps::where('kecamatan_kode', '110609')->orderBy('kelurahan_desa_kode')->orderBy('tps')->get();
    return view('home', [
        'datas' => $test
    ]);
    return $test;
});
