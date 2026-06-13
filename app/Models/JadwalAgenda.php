<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAgenda extends Model
{
    use HasFactory;

    protected $table = 'jadwal_agenda';

    protected $fillable = [
        'agenda_name',
        'start_date',
        'end_date',
        'desc',
        'image',
    ];
}
