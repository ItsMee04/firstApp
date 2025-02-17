<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function getPegawai()
    {
        $pegawai = Pegawai::where('status', 1)->get();

        return response()->json(['success' => true, 'messaged' => 'Data Pegawai Berhasil Ditemukan', 'Data' => $pegawai]);
    }
}
