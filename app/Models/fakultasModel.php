<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class fakultasModel extends Model
{
    use HasFactory;
    protected $table = 'fakultas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama'
    ];

    public function program_studi_model() : HasMany
    {
        return $this->hasMany(program_studi_model::class);
    }

    public function mahasiswa() : HasMany
    {
        return $this->hasMany(mahasiswaModel::class);
    }
}
