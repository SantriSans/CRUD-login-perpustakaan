<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sirkulasi extends Model
{
    use HasFactory;
    protected $table = 'sirkulasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tgl_pinjam',
        'nbi',
        'tgl_kembali',
        'denda',
        'kondisi',
        'mahasiswa_id',
        'kode_buku',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswaModel::class, 'mahasiswa_id','id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'kode_buku','id');
    }
}
