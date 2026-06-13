<?php

namespace App\Models;

use App\Models\Keahlian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'pelatihan';

    protected $fillable = [
        'pegawai_id',
        'keahlian_id',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function keahlian()
    {
        return $this->belongsTo(Keahlian::class);
    }
}
