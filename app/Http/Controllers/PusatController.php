<?php

namespace App\Http\Controllers;

use App\Models\Pusat;
use Illuminate\Http\Request;

class PusatController extends Controller
{
    public function daftarpusat()
    {
        $pusat = Pusat::all();
        return response()->json(
            $pusat
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'kode_pusat' => 'required',
            'nama_pusat' => 'required',
            'alamat_pusat' => 'required',
            'nama_kepala_pusat' => 'required',
        ]);
    
        $daftarpusat= new Pusat();
        $daftarpusat->Id_pusat = $request->Id_pusat;
        $daftarpusat->kode_pusat = $request->kode_pusat;
        $daftarpusat->nama_pusat = $request->nama_pusat;
        $daftarpusat->alamat_pusat = $request->alamat_pusat;
        $daftarpusat->nama_kepala_pusat = $request->nama_kepala_pusat;
        $daftarpusat->save();
        error_log($request);
        return response()->json(['message' => 'Data pusat berhasil ditambahkan']);
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'kode_pusat' => 'required',
            'nama_pusat' => 'required',
            'alamat_pusat' => 'required',
            'nama_kepala_pusat' => 'required',
        ]);

        $daftarpusat= Pusat::where('Id_pusat', $id)->update([
            'Kode_pusat' => $request->kode_pusat,
            'Nama_pusat' => $request->nama_pusat,
            'Alamat_pusat' => $request->alamat_pusat,
            'Nama_kepala_pusat' => $request->nama_kepala_pusat
        ]);
       

        $newData = Pusat::find($id);
    
        return response()->json(['message' => 'Data pusat berhasil diupdate', "data_pusat" => $newData]);
    }
    
    
}



