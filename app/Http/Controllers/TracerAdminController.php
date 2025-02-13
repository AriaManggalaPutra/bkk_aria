<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wirausaha;
use App\Models\PekerjaanUser;
use App\Models\PendidikanUser;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TracerStudyExport;

class TracerAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $murid = User::whereNotIn('roles', ['admin'])->get();
        return view('admin-page.tracerStudy.listTracer', compact('murid'));
    }

    public function export()
    {
        return Excel::download(new TracerStudyExport, 'tracer_study.xlsx');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $murid = User::where('id',$id)->first();
        $pekerjaans = PekerjaanUser::where('id_user',$id)->get();
        $pendidikans = PendidikanUser::where('id_user',$id)->get();
        $wirausahas = Wirausaha::where('id_user', $id)->get();
        return view ('admin-page.tracerStudy.showTracer', compact('murid', 'pekerjaans', 'pendidikans', 'wirausahas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
