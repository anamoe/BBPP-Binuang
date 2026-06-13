<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    use HasFactory;

    protected $table = 'sarana_prasarana';

    // Field yang bisa diisi massal
    protected $fillable = [
        'name',
        'image',
        'status',
        'wa',
        'form_pemesanan',
        'desc',
    ];
}
