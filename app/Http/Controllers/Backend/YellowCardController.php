<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Population;
use App\Models\YellowCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class YellowCardController extends Controller
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
        $file = $request->file('file')->store('assets/kartu-kuning', 'public');
        $population = Population::find(Auth::user()->id);
        if ($population) {
            $curriculumVitae = YellowCard::create([
                'file' => $file,
                'population_id' => $population->id
            ]);
            if ($curriculumVitae) {
                return redirect()->back()->with('success', 'File AK-1 berhasil di tambahkan');
            }
            return redirect()->back()->with('danger', 'File AK-1 gagal di tambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\YellowCard  $yellowCard
     * @return \Illuminate\Http\Response
     */
    public function show(YellowCard $yellowCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\YellowCard  $yellowCard
     * @return \Illuminate\Http\Response
     */
    public function edit(YellowCard $yellowCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\YellowCard  $yellowCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, YellowCard $yellowCard)
    {
        $request->validate([
            'file' => 'required',
        ]);
        File::delete('storage/' . $yellowCard->file);
        $file = $request->file('file')->store('assets/kartu-kuning', 'public');
        $yellowCard->update([
            'file' => $file
        ]);
        if ($yellowCard) {
            return redirect()->back()->with('success', 'File AK-1 berhasil di ubah');
        }
        return redirect()->back()->with('danger', 'File AK-1 gagal di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\YellowCard  $yellowCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(YellowCard $yellowCard)
    {
        //
    }
}
