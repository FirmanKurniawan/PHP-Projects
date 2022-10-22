<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use HasJsonRelationships;

class SuratKeluar extends Model
{
    use HasFactory, HasJsonRelationships;

    protected $table = 'surat_keluar';
    protected $guarded = ['id'];
    protected $casts = [
        'pegawai' => 'json',
    ];

    public function Nomor()
    {
        return $this->belongsTo(Nomor::class);
    }
    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function Periode()
    {
        return $this->belongsTo(Periode::class);
    }
    public function Lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
    public function Pegawai()
    {
        return $this->belongsToJson(Pegawai::class, 'pegawai');
    }
    public function Penandatangan()
    {
        return $this->belongsTo(Pegawai::class, 'penandatangan');
    }
}
