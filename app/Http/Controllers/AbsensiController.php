<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\Validator;


class AbsensiController extends Controller
{    
    
    public function index()
    {
        $absensi = Absensi::all();

        return response()->json(['message' => 'Data absensi berhasil diambil.']);
    }
     public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'npm'     => 'required',
            'tanggal_absen'   => 'required',
            'status_absen'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $absensi = Absensi::create([
            'nama'     => $request->nama,
            'npm'     => $request->npm,
            'tanggal_absen'   => $request->tanggal_absen,
            'status_absen'   => $request->status_absen,
        ]);

        //return response
        return response()->json([
            'success'=>true,
            'mesage'=>'data berhasil ditambahkan',
            'data'  => $absensi
        ]);
    }
}