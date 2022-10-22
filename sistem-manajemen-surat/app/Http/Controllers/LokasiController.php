<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::all();
        return view("master.lokasi.index", [
            'lokasis' => $lokasis
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi_create' => 'required|string|max:255',
        ]);

        Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi_create,
        ]);
        return redirect()->route('lokasi.index')->with('success', 'Data lokasi berhasil ditambahkan');
    }

    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'nama_lokasi_edit' => 'required|string|max:255',
        ]);

        $lokasi->update([
            'nama_lokasi' => $request->nama_lokasi_edit,
        ]);
        return redirect()->route('lokasi.index')->with('success', 'Data lokasi berhasil diubah');
    }

    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success', 'Data lokasi berhasil dihapus');
    }
}
