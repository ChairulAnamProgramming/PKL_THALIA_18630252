<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['educations'] = Education::orderBy('name', 'ASC')->get();
        return view('backend.pages.education.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255'
        ]);
        $education = Education::create($request->all());
        if ($education) {
            return redirect()->back()->with('success', 'Data Pendidikan berhasil di tambahkan.');
        }
        return redirect()->back()->with('danger', 'Data Pendidikan gagal di tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255'
        ]);
        $education->update($request->all());
        if ($education) {
            return redirect()->back()->with('success', 'Data Pendidikan berhasil di update.');
        }
        return redirect()->back()->with('danger', 'Data Pendidikan gagal di update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->delete();
        if ($education) {
            return redirect()->back()->with('success', 'Data Pendidikan berhasil di hapus.');
        }
        return redirect()->back()->with('danger', 'Data Pendidikan gagal di hapus.');
    }
}
