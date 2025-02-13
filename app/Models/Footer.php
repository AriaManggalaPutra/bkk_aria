<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $table = 'footer';  // Nama tabel sesuai dengan yang ada di database

    protected $fillable = [
        'detail_information',
        'phone',
        'email',
        'address',
        'button_link_instagram',
        'button_link_facebook',
        'button_link_twitter',
        'button_link_youtube',
        'social_media_description',
    ];

}
