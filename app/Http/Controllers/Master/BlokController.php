<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Blok;
use Illuminate\Http\Request;

class BlokController extends Controller
{
    public function getBlok()
    {
        $blok = Blok::with(['lokasi', 'tipe'])->where('status', 1)->get();

        return response()->json(['success' => true, 'message' => 'Data Blok Berhasil Ditemukan', 'Data' => $blok]);
    }
}
