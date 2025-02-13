<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = [
        'nama',
        'angkatan',
        'email',
        'password',
        'no_telepon',
        'jurusan',
        'tahun_lulus',
        'rayon',
        'status',
        'feedback',
        'alamat',
        'roles',
        'profile',
        'created_by',
        'updated_by',   
    ];

public function lamaran()
{
    return $this->hasMany(Lamaran::class, 'id');
}
}
