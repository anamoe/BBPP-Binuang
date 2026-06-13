<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasaranaSlider extends Model
{
    use HasFactory;

    protected $table = 'sarana_prasarana_slider';

    protected $fillable = [
        'image',
    ];
}
