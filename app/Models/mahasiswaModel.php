<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class mahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'nim',
        'jenis_kelamin',
        'alamat',
        'fakultas_id',
        'program_studi_id'
    ];

    public function fakultasModel() 
    {
        return $this->belongsTo(fakultasModel::class,'fakultas_id','id');
    }

    public function program_studi_model()
    {
        return $this->belongsTo(program_studi_model::class,'program_studi_id','id');
    }

    public function sirkulasi() : HasMany
    {
        return $this->hasMany(Sirkulasi::class);
    }
}
