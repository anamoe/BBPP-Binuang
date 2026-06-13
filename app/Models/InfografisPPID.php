<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfografisPPID extends Model
{
    use HasFactory;

    protected $table = 'infografis_ppid';

    protected $fillable = [
        'image',
    ];
}
