<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    public function index()
    {
        $pangkats = Pangkat::all();
        return view("master.pangkat.index", [
            'pangkats' => $pangkats
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pangkat_create' => 'required|string|max:255',
            'golongan_create' => 'required|string|max:255',
        ]);

        Pangkat::create([
            'nama_pangkat' => $request->nama_pangkat_create,
            'golongan' => $request->golongan_create,
        ]);
        return redirect()->route('pangkat.index')->with('success', 'Data pangkat berhasil ditambahkan');
    }

    public function update(Request $request, Pangkat $pangkat)
    {
        $request->validate([
            'nama_pangkat_edit' => 'required|string|max:255',
            'golongan_edit' => 'required|string|max:255',
        ]);

        $pangkat->update([
            'nama_pangkat' => $request->nama_pangkat_edit,
            'golongan' => $request->golongan_edit,
        ]);
        return redirect()->route('pangkat.index')->with('success', 'Data pangkat berhasil diubah');
    }

    public function destroy(Pangkat $pangkat)
    {
        $pangkat->delete();
        return redirect()->route('pangkat.index')->with('success', 'Data pangkat berhasil dihapus');
    }
}
