<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function lowongans()
    {
        return $this->hasMany(Lowongan::class, 'id_perusahaan');
    }
}
