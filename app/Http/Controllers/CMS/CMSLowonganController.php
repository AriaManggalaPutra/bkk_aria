<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LowonganSection;

class CMSLowonganController extends Controller
{
    public function index()
    {
        $lowongan = LowonganSection::first();
        return view('admin-page.CMS.lowongan.settings', compact('lowongan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'outline_title' => 'required',
            'solid_title' => 'required',
            'detail_information' => 'required',
            'button_label' => 'required',
            'button_link' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'headline_title' => 'required',
            'headline_description' => 'required',
        ]);

        $lowongan = LowonganSection::findOrFail($id);
        $lowongan-> update($request->all());

        return redirect()->back()->with('success', 'Lowongan berhasil diperbarui!');

    }





}
