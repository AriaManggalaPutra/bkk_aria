<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // pastikan 'id_user' adalah foreign key yang benar
    }

    // Relasi dengan model Lowongan
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan'); // pastikan 'id_lowongan' adalah foreign key yang benar
    }
}
