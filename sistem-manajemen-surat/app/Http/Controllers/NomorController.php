<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use Illuminate\Http\Request;

class NomorController extends Controller
{
    public function index()
    {
        $nomors = Nomor::all();
        return view("master.nomor.index", [
            'nomors' => $nomors
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat_create' => 'required|string|max:255',
        ]);

        Nomor::create([
            'nomor_surat' => $request->nomor_surat_create,
        ]);
        return redirect()->route('nomor.index')->with('success', 'Data nomor berhasil ditambahkan');
    }

    public function update(Request $request, Nomor $nomor)
    {
        $request->validate([
            'nomor_surat_edit' => 'required|string|max:255',
        ]);

        $nomor->update([
            'nomor_surat' => $request->nomor_surat_edit,
        ]);
        return redirect()->route('nomor.index')->with('success', 'Data nomor berhasil diubah');
    }

    public function destroy(Nomor $nomor)
    {
        $nomor->delete();
        return redirect()->route('nomor.index')->with('success', 'Data nomor berhasil dihapus');
    }
}
