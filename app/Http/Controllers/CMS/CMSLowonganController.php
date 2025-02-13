<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CMSLowonganController extends Controller
{
    public function index()
    {
        return view('admin-page.CMS.lowongan.settings');
    }
}
