<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    // Menampilkan daftar dosen
    public function index()
    {
        $dosen = Dosen::all();
        return response()->json($dosen);
    }

    // Menambahkan dosen baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:dosen',
            'password' => 'required|min:8',
            'nip' => 'required|unique:dosen',
        ]);

        $dosen = Dosen::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'nip' => $validated['nip'],
        ]);

        return response()->json(['message' => 'Dosen berhasil ditambahkan!', 'data' => $dosen], 201);
    }

    // Melihat detail dosen
    public function show($id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json(['message' => 'Dosen tidak ditemukan'], 404);
        }

        return response()->json($dosen);
    }

    // Memperbarui data dosen
    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json(['message' => 'Dosen tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama' => 'string|max:255',
            'email' => 'email|unique:dosen,email,' . $id,
            'password' => 'min:8',
            'nip' => 'unique:dosen,nip,' . $id,
        ]);

        if ($request->has('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $dosen->update($validated);

        return response()->json(['message' => 'Dosen berhasil diperbarui!', 'data' => $dosen]);
    }

    // Menghapus dosen
    public function destroy($id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json(['message' => 'Dosen tidak ditemukan'], 404);
        }

        $dosen->delete();

        return response()->json(['message' => 'Dosen berhasil dihapus!']);
    }
}
