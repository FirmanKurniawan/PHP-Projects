<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::all();
        return view("master.periode.index", [
            'periodes' => $periodes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_periode_create' => 'required|string|max:255',
        ]);

        Periode::create([
            'nama_periode' => $request->nama_periode_create,
        ]);
        return redirect()->route('periode.index')->with('success', 'Data periode berhasil ditambahkan');
    }

    public function update(Request $request, Periode $periode)
    {
        $request->validate([
            'nama_periode_edit' => 'required|string|max:255',
        ]);

        $periode->update([
            'nama_periode' => $request->nama_periode_edit,
        ]);
        return redirect()->route('periode.index')->with('success', 'Data periode berhasil diubah');
    }

    public function destroy(Periode $periode)
    {
        $periode->delete();
        return redirect()->route('periode.index')->with('success', 'Data periode berhasil dihapus');
    }
}
