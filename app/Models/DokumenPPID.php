<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPPID extends Model
{
    use HasFactory;

    protected $table = 'dokumen_ppid';

    protected $fillable = [
        'name',
        'file',
        'jenis_ppid_id',
    ];

    // Relasi ke JenisPpid
    public function jenis()
    {
        return $this->belongsTo(JenisPpid::class, 'jenis_ppid_id');
    }
}
