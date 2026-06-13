<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaSertifikasi extends Model
{
    use HasFactory;

    protected $table = 'skema_sertifikasi';

    protected $fillable = [
        'image',
        'desc',
        'keahlian_id',
    ];

    public function keahlian()
    {
        return $this->belongsTo(Keahlian::class);
    }
}
