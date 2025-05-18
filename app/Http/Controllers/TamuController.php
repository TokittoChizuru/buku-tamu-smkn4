<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TamuController extends Controller
{
    public function addData(Request $request)
{
    $valid = $request->validate([
        'nama_lengkap' => ['required'],
        'asal_tamu'    => ['required'],
        'menemui'      => ['required'],
        'alasan'       => ['required'],
        'foto_tamu'    => ['required'], // base64 image string
    ]);

    // Decode base64 dari foto
    $dataURL = $request->foto_tamu;
    list(, $data) = explode(',', $dataURL);
    $imageData = base64_decode($data);

    // Nama file unik
    $fileName = uniqid('image_') . '.png';

    // Simpan ke disk 'public' di folder 'img'
    Storage::disk('public')->put('img/' . $fileName, $imageData);

    // Simpan path relatif ke DB (sesuai disk public)
    $valid['foto_tamu'] = 'img/' . $fileName;

    Tamu::create($valid);


    return response()->json([
    'success' => true,
    'message' => 'Berhasil menambah list tamu.'
]);

}


    public function index()
    {
        $tamus = Tamu::latest()->take(10)->get();
        return view('welcome', compact('tamus'));
    }
}
