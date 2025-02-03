<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['judul', 'ringkasan', 'tahun', 'poster', 'genre_id'];

    // Relationship with Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // Relationship with Peran
    public function perans()
    {
        return $this->hasMany(Peran::class);
    }

    // Relationship with Kritik
    public function kritiks()
    {
        return $this->hasMany(Kritik::class);
    }
}