<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CurriculumVitae;
use App\Models\Population;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class CurriculumVitaeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'file' => 'required',
        ]);
        $file = $request->file('file')->store('assets/cv', 'public');
        $population = Population::find(Auth::user()->id);
        if ($population) {
            $curriculumVitae = CurriculumVitae::create([
                'document' => $file,
                'population_id' => $population->id
            ]);
            if ($curriculumVitae) {
                return redirect()->back()->with('success', 'Data CV berhasil di tambahkan');
            }
            return redirect()->back()->with('danger', 'Data CV gagal di tambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurriculumVitae  $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function show(CurriculumVitae $curriculumVitae)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurriculumVitae  $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function edit(CurriculumVitae $curriculumVitae)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CurriculumVitae  $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurriculumVitae $curriculumVitae)
    {
        $request->validate([
            'file' => 'required',
        ]);
        File::delete('storage/' . $curriculumVitae->document);
        $file = $request->file('file')->store('assets/cv', 'public');
        $curriculumVitae->update([
            'document' => $file,
        ]);
        if ($curriculumVitae) {
            return redirect()->back()->with('success', 'Data CV berhasil di tambahkan');
        }
        return redirect()->back()->with('danger', 'Data CV gagal di tambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurriculumVitae  $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurriculumVitae $curriculumVitae)
    {
        //
    }
}
