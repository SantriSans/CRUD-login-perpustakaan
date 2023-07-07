<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'pengarang',
        'tahun',
        'isbn',
        'jml_halaman',
        'kode_buku',
    ];

    public function sirkulasi() : HasMany
    {
        return $this->hasMany(Sirkulasi::class);
    }

}
