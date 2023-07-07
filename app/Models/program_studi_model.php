<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class program_studi_model extends Model
{
    use HasFactory;
    protected $table = 'program_studi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'fakultas_model_id'
    ];

    public function fakultasModel() : BelongsTo
    {
        return $this->belongsTo(fakultasModel::class,'fakultas_model_id','id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(mahasiswaModel::class);
    }
}
