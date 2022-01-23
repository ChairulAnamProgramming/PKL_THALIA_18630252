<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EducationalBackground;
use App\Models\Population;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;

class EducationalBackgroundController extends Controller
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
            'education_id' => 'required|string|exists:education,id',
            'year' => 'required|string',
            'document' => 'required',
        ]);

        $population = Population::find(Auth::user()->id);

        if ($population) {
            $document = $request->file('document')->store('assets/ijazah', 'public');
            $educationalBackground = EducationalBackground::create([
                'population_id' => $population->id,
                'education_id' => $request->education_id,
                'year' => date('Y', strtotime($request->year)),
                'document' => $document,
            ]);
            if ($educationalBackground) {
                return redirect()->back()->with('success', 'Riwayat pendidikan berhasil di tambahkan.');
            }
        }
        return redirect()->back()->with('danger', 'Riwayat pendidikan gagal di tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EducationalBackground  $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function show(EducationalBackground $educationalBackground)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EducationalBackground  $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationalBackground $educationalBackground)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EducationalBackground  $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationalBackground $educationalBackground)
    {
        $request->validate([
            'education_id' => 'required|string|exists:education,id',
            'year' => 'required|string',
            'document' => 'required',
        ]);
        File::delete('storage/' . $educationalBackground->document);
        $document = $request->file('document')->store('assets/ijazah', 'public');
        $educationalBackground->update([
            'education_id' => $request->education_id,
            'year' => date('Y', strtotime($request->year)),
            'document' => $document,
        ]);
        if ($educationalBackground) {
            return redirect()->back()->with('success', 'Riwayat pendidikan berhasil di ubah.');
        }
        return redirect()->back()->with('danger', 'Riwayat pendidikan gagal di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EducationalBackground  $educationalBackground
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationalBackground $educationalBackground)
    {
        File::delete('storage/' . $educationalBackground->document);
        $educationalBackground->delete();
        if ($educationalBackground) {
            return redirect()->back()->with('success', 'Riwayat pendidikan berhasil di hapus.');
        }
        return redirect()->back()->with('danger', 'Riwayat pendidikan gagal di hapus.');
    }
}
