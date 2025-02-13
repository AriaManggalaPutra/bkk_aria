<?php

namespace App\Http\Controllers\CMS;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CMSFooterController extends Controller
{
    public function index()
    {
        $footerSettings = Footer::first();
        return view('admin-page.CMS.footer.settings', compact('footerSettings'));
    }


    public function edit($id)
    {
        $footerSettings = Footer::findOrFail($id);
        return response()->json($footerSettings);
    }

    // Mengupdate data footer setting
    public function update(Request $request, $id)
    {
        $request->validate([
            'detail_information' => 'required',
            'phone' => 'required|min:11',
            'email' => 'required|email',
            'address' => 'nullable',
            'button_link_instagram' => 'nullable|url',
            'button_link_facebook' => 'nullable|url',
            'button_link_twitter' => 'nullable|url',
            'button_link_youtube' => 'nullable|url',
            'social_media_description' => 'nullable',
        ]);

        $footerSettings = Footer::findOrFail($id);
        $footerSettings->update($request->all());

        return response()->json(['success' => 'Footer setting berhasil diperbarui!']);
    }



}
