<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Nomor;
use App\Models\Pegawai;
use App\Models\Periode;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $surats = SuratKeluar::with([
            'Nomor',
            'Kategori',
            'Periode',
            'Lokasi',
            'Pegawai',
        ])->get();
        return view('surat.keluar.index', [
            'surats' => $surats
        ]);
    }

    public function create()
    {
        $nomors = Nomor::all();
        $kategoris = Kategori::all();
        $periodes = Periode::all();
        $lokasis = Lokasi::all();
        $pegawais = Pegawai::all();
        return view('surat.keluar.create', [
            'nomors' => $nomors,
            'kategoris' => $kategoris,
            'periodes' => $periodes,
            'lokasis' => $lokasis,
            'pegawais' => $pegawais
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun' => 'required',
            'tanggal' => 'required|string|max:255',
            'pegawai' => 'required',
            'lokasi_terbit' => 'required|string|max:255',
            'tanggal_terbit' => 'required|string|max:255',
            'nomor_id' => 'required',
            'kategori_id' => 'required',
            'periode_id' => 'required',
            'lokasi_id' => 'required',
            'penandatangan' => 'required',
        ]);

        $validatedData['pegawai'] = array_unique($request->pegawai);

        SuratKeluar::create($validatedData);
        return redirect()->route('surat.surat-keluar.index')->with('success', 'Surat berhasil dibuat');
    }

    public function edit(SuratKeluar $surat_keluar)
    {
        $nomors = Nomor::all();
        $kategoris = Kategori::all();
        $periodes = Periode::all();
        $lokasis = Lokasi::all();
        $pegawais = Pegawai::all();
        return view('surat.keluar.edit', [
            'surat' => $surat_keluar,
            'nomors' => $nomors,
            'kategoris' => $kategoris,
            'periodes' => $periodes,
            'lokasis' => $lokasis,
            'pegawais' => $pegawais
        ]);
    }

    public function update(Request $request, SuratKeluar $surat_keluar)
    {
        $validatedData = $request->validate([
            'tahun' => 'required',
            'tanggal' => 'required|string|max:255',
            'pegawai' => 'required',
            'lokasi_terbit' => 'required|string|max:255',
            'tanggal_terbit' => 'required|string|max:255',
            'nomor_id' => 'required',
            'kategori_id' => 'required',
            'periode_id' => 'required',
            'lokasi_id' => 'required',
            'penandatangan' => 'required',
        ]);

        $validatedData['pegawai'] = array_unique($request->pegawai);
        $validatedData['file'] = null;
        $surat_keluar->update($validatedData);
        return redirect()->route('surat.surat-keluar.index')->with('success', 'Surat berhasil diubah');
    }

    public function destroy(SuratKeluar $surat_keluar)
    {
        $surat_keluar->delete();
        return redirect()->route('surat.surat-keluar.index')->with('success', 'Surat berhasil dihapus');
    }

    public function export(SuratKeluar $surat_keluar)
    {
        if ($surat_keluar->file != null) {
            return response()->download(public_path($surat_keluar->file));
        }

        $template = asset('suratkeluar/SuratKeluarTemplate.docx');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template);
        $templateProcessor->setValue('nomor', $surat_keluar->Nomor->nomor_surat);
        $templateProcessor->setValue('tujuan', $surat_keluar->Kategori->nama_kategori);
        $templateProcessor->setValue('periode', $surat_keluar->Periode->nama_periode);
        $templateProcessor->setValue('tahun', $surat_keluar->tahun);
        $templateProcessor->setValue('tanggal_pelaksanaan', formatTanggalPelaksanaan($surat_keluar->tanggal));
        $templateProcessor->setValue('lokasi_pelaksanaan', $surat_keluar->Lokasi->nama_lokasi);
        $templateProcessor->setValue('lokasi_terbit', $surat_keluar->lokasi_terbit);
        $templateProcessor->setValue('tanggal_terbit', formatTanggalTerbit($surat_keluar->tanggal_terbit));
        $templateProcessor->setValue('penandatangan', $surat_keluar->Penandatangan->nama_pegawai);
        $templateProcessor->setValue('nip', $surat_keluar->Penandatangan->nip);

        $no = 1;
        $templateProcessor->cloneBlock('list_pegawai', $surat_keluar->Pegawai->count(), true, true);
        foreach ($surat_keluar->Pegawai as $pegawai) {
            $templateProcessor->setValue('nama_pegawai#' . $no, $pegawai->nama_pegawai);
            $templateProcessor->setValue('nip_pegawai#' . $no, $pegawai->nip);
            $templateProcessor->setValue('pangkat#' . $no, $pegawai->Pangkat->nama_pangkat);
            $templateProcessor->setValue('jabatan#' . $no, $pegawai->Jabatan->nama_jabatan);
            $no++;
        }

        $file = "{$surat_keluar->id}-Surat-Keluar.docx";
        $surat_keluar->file = "suratkeluar/" . $file;
        $surat_keluar->update();

        $templateProcessor->saveAs('suratkeluar/' . $file);
        return response()->download(public_path('suratkeluar/' . $file));
    }
}
