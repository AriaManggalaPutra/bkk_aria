<?php

namespace App\Http\Controllers\CMS;

use App\Models\KeterserapanSections;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CMSKeterserapanController extends Controller
{
    public function index()
    {
        $keterserapan = KeterserapanSections::first();
        return view('admin-page.CMS.data_keterserapan.settings', compact('keterserapan'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'outline_title' => 'required',
            'solid_title' => 'required',
            'description' => 'required',

        ]);

        $keterserapan = KeterserapanSections::findOrFail($id);
        $keterserapan-> update($request->all());

        return redirect()->back()->with('success', 'bagian data keterserapan berhasil diperbarui!');

    }
}
