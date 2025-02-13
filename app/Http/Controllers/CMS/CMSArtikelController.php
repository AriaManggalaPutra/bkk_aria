<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CMSArtikelController extends Controller
{
    public function index()
    {
        return view('admin-page.CMS.artikel.settings');
    }
}
