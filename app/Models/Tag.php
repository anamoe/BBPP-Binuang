<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'tag_name',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}