<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Nomor;
use App\Models\Periode;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        $surats = SuratMasuk::with([
            'Nomor',
            'Kategori',
            'Periode',
            'Lokasi',
        ])->get();
        return view('surat.masuk.index', [
            'surats' => $surats
        ]);
    }

    public function create()
    {
        $nomors = Nomor::all();
        $kategoris = Kategori::all();
        $periodes = Periode::all();
        $lokasis = Lokasi::all();
        return view('surat.masuk.create', [
            'nomors' => $nomors,
            'kategoris' => $kategoris,
            'periodes' => $periodes,
            'lokasis' => $lokasis,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_id' => 'required',
            'kategori_id' => 'required',
            'periode_id' => 'required',
            'lokasi_id' => 'required',
            'tanggal_masuk' => 'required',
            'file' => 'required|file|mimes:pdf,jpeg,jpg,png|max:1024',
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('surat-masuk');
        }

        SuratMasuk::create($validatedData);
        return redirect()->route('surat.surat-masuk.index')->with('success', 'Surat berhasil dibuat');
    }

    public function edit(SuratMasuk $surat_masuk)
    {
        $nomors = Nomor::all();
        $kategoris = Kategori::all();
        $periodes = Periode::all();
        $lokasis = Lokasi::all();
        return view('surat.masuk.edit', [
            'surat' => $surat_masuk,
            'nomors' => $nomors,
            'kategoris' => $kategoris,
            'periodes' => $periodes,
            'lokasis' => $lokasis,
        ]);
    }

    public function update(Request $request, SuratMasuk $surat_masuk)
    {
        $validatedData = $request->validate([
            'nomor_id' => 'required',
            'kategori_id' => 'required',
            'periode_id' => 'required',
            'lokasi_id' => 'required',
            'tanggal_masuk' => 'required',
            'file' => 'file|mimes:pdf,jpeg,jpg,png|max:1024',
        ]);

        if ($request->file('file')) {
            if ($surat_masuk->file) {
                Storage::delete($surat_masuk->file);
            }
            $validatedData['file'] = $request->file('file')->store('surat-masuk');
        }

        $surat_masuk->update($validatedData);
        return redirect()->route('surat.surat-masuk.index')->with('success', 'Surat berhasil diubah');
    }

    public function destroy(SuratMasuk $surat_masuk)
    {
        if ($surat_masuk->file) {
            Storage::delete($surat_masuk->file);
        }
        $surat_masuk->delete();
        return redirect()->route('surat.surat-masuk.index')->with('success', 'Surat berhasil dihapus');
    }

    public function download(SuratMasuk $surat_masuk)
    {
        $mime = Storage::mimeType($surat_masuk->file);
        $ext = explode('/', $mime)[1];
        $tanggal = str_replace("/", "-", $surat_masuk->tanggal_masuk);
        $name = "SuratMasuk_{$surat_masuk->id}_{$tanggal}.{$ext}";
        $headers = array(
            'Content-Type' => $mime,
        );
        return Storage::download($surat_masuk->file, $name, $headers);
    }
}
