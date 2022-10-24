<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::with(['Jabatan', 'Pangkat'])->get();
        $jabatans = Jabatan::all();
        $pangkats = Pangkat::all();
        return view("master.pegawai.index", [
            'pegawais' => $pegawais,
            'jabatans' => $jabatans,
            'pangkats' => $pangkats
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai_create' => 'required|string|max:255',
            'nip_create' => 'required|string|max:255',
            'jabatan_create' => 'required',
            'pangkat_create' => 'required',
        ]);

        Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai_create,
            'nip' => $request->nip_create,
            'jabatan_id' => $request->jabatan_create,
            'pangkat_id' => $request->pangkat_create,
        ]);
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan');
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama_pegawai_edit' => 'required|string|max:255',
            'nip_edit' => 'required|string|max:255',
            'jabatan_edit' => 'required',
            'pangkat_edit' => 'required',
        ]);

        $pegawai->update([
            'nama_pegawai' => $request->nama_pegawai_edit,
            'nip' => $request->nip_edit,
            'jabatan_id' => $request->jabatan_edit,
            'pangkat_id' => $request->pangkat_edit,
        ]);
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diubah');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus');
    }
}
