<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['mahasiswa_id', 'mata_kuliah', 'nilai'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}