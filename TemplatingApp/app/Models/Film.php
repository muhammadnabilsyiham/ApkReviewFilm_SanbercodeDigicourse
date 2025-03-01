<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    protected $fillable = ["tittle", "summary", "release_year", "poster", "genre_id"];

    public function Genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function listReview()
    {
        return $this->hasMany(Reviews::class, 'film_id');
    }
}

