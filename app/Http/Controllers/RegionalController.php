<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use App\Models\Pusat;
use Illuminate\Http\Request;

class RegionalController extends Controller
{
    public function daftarregional()
    {
        // Menggunakan join untuk mendapatkan data regional beserta data pusat terkait
        $regional = Regional::join('pusat', 'regional.Id_pusat', '=', 'pusat.Id_pusat')
            ->select('regional.*', 'pusat.nama_pusat', 'pusat.kode_pusat')
            ->get();
        
        return response()->json($regional);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_regional' => 'required',
            'nama_regional' => 'required',
            'alamat_regional' => 'required',
            'nama_kepala_regional' => 'required',
            'Id_pusat' => 'required|exists:pusat,Id_pusat' // Validasi foreign key
        ]);

        $daftarregional = new Regional();
        $daftarregional->Id_regional = $request->Id_regional;
        $daftarregional->kode_regional = $request->kode_regional;
        $daftarregional->nama_regional = $request->nama_regional;
        $daftarregional->alamat_regional = $request->alamat_regional;
        $daftarregional->nama_kepala_regional = $request->nama_kepala_regional;
        $daftarregional->Id_pusat = $request->Id_pusat;
        
        $daftarregional->save();
        
        return response()->json(['message' => 'Data regional berhasil ditambahkan']);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'kode_regional' => 'required',
            'nama_regional' => 'required',
            'alamat_regional' => 'required',
            'nama_kepala_regional' => 'required',
            'Id_pusat' => 'required|exists:pusat,Id_pusat' // Validasi foreign key
        ]);

        $daftarregional = Regional::where('Id_regional', $id)->update([
            'kode_regional' => $request->kode_regional,
            'nama_regional' => $request->nama_regional,
            'alamat_regional' => $request->alamat_regional,
            'nama_kepala_regional' => $request->nama_kepala_regional,
            'Id_pusat' => $request->Id_pusat
        ]);

        $newData = Regional::find($id);
    
        return response()->json(['message' => 'Data regional berhasil diupdate', 'data_regional' => $newData]);
    }
}
