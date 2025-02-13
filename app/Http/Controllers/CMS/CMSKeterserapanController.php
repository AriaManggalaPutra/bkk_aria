<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CMSKeterserapanController extends Controller
{
    public function index()
    {
        return view('admin-page.CMS.data_keterserapan.settings');
    }

}
