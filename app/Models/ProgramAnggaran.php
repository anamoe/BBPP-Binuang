<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramAnggaran extends Model
{
    use HasFactory;

    protected $table = 'program_anggaran';

    protected $fillable = [
        'name',
        'file',
        'jenis_program_anggaran_id',
    ];

    public function jenis()
    {
        return $this->belongsTo(JenisProgramAnggaran::class, 'jenis_program_anggaran_id');
    }
}
