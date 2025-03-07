<?php

namespace App\Http\Controllers\CMS;

use App\Models\RekruterSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CMSRekruterController extends Controller
{
    public function index()
    {
        $rekruter = RekruterSection::first();
        return view('admin-page.CMS.rekruter.settings', compact('rekruter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'outline_title' => 'required',
            'solid_title' => 'required',
            'description' => 'required',
            'button_label' => 'required',
            'button_link' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $rekruter = RekruterSection::findOrFail($id);
        $rekruter-> update($request->all());

        return redirect()->back()->with('success', 'rekruter berhasil diperbarui!');

    }
}
