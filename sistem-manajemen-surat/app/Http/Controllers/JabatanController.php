<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('master.jabatan.index', [
            'jabatans' => $jabatans,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan_create' => 'required|string|max:255',
        ]);

        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan_create,
        ]);
        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil ditambahkan');
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'nama_jabatan_edit' => 'required|string|max:255',
        ]);

        $jabatan->update([
            'nama_jabatan' => $request->nama_jabatan_edit,
        ]);
        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil diubah');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil dihapus');
    }
}
