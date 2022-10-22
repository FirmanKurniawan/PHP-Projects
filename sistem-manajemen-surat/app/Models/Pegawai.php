<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $guarded = ['id'];

    public function Jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function Pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }
}
