<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        return view('master.lokasi');
    }

    public function loadLokasi()
    {
        $lokasi = Lokasi::all();

        return response()->json(['success' => true, 'message' => 'Data Berhasil Ditemukan', 'Data' => $lokasi]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'lokasi'           =>  'required',
        ], $messages);

        $lokasi = Lokasi::create([
            'lokasi' => $request->lokasi,
            'status' => 1,
        ]);
        return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
    }
}
