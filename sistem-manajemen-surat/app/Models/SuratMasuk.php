<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $guarded = ['id'];

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
}
