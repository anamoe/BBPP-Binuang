<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UptExternal extends Model
{
    use HasFactory;

    protected $table = 'upt_external';

    protected $fillable = [
        'image',
        'link',
    ];
}
