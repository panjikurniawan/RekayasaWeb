<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Daftarmaba;

class ControllerDaftarmaba extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();
        $daftarmaba = Daftarmaba::create($data);

        return response()->json($daftarmaba);
    }

    public function index()
    {
        $daftarmaba = Daftarmaba::all();
        return response()->json($daftarmaba);
    }

    public function detail($id)
    {
        $daftarmaba = Daftarmaba::find($id); 
        return response()->json($daftarmaba);
    }

    public function update(Request $request, $id)
    {
        $daftarmaba = Daftarmaba::whereId($id)->update([
            'Nama_Pendaftar' => $request->input('Nama_Pendaftar'),
            'Tempat_Lahir' => $request->input('Tempat_Lahir'),
            'Tanggal_Lahir'=> $request->input('Tanggal_Lahir'),
            'Alamat'=> $request->input('Alamat'),
            'Jalur_Masuk'=> $request->input('Jalur_Masuk'),
            'Prodi'=> $request->input('Prodi'),
            'Sekolah_Asal'=> $request->input('Sekolah_Asal'),
            'No_hp'=> $request->input('No_hp'),
            'Email'=> $request->input('Email'),
        ]);

        if($daftarmaba){
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil di update',
                'data' => $daftarmaba
            ],201);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Data gagal di update',
            ],400);
        }
    }

    public function delete($id)
    {
        $daftarmaba= Daftarmaba::whereId($id)->first();
        $daftarmaba->delete();

        if($daftarmaba)
        {
            return response()->json(
                [
                    'success'=> true,
                    'message'=> 'Data berhasil dihapus'
                ],200);
        }
    }
}