<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['districts'] = District::orderBy('name', 'ASC')->get();
        return view('backend.pages.district.index', $data);
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
            'name' => 'required|max:255|unique:districts',
        ]);
        $district = District::create([
            'name' => $request->name,
            'slug' =>  Str::slug($request->name),
        ]);
        if ($district) {
            return redirect()->back()->with('success', 'Data Kecamatan berhasil ditambahkan.');
        }
        return redirect()->back()->with('danger', 'Data Kecamatan gagal ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        if ($request->name != $district->name) {
            $request->validate([
                'name' => 'required|max:255|unique:districts',
            ]);
        } else {
            $request->validate([
                'name' => 'required|max:255',
            ]);
        }
        $district->update([
            'name' => $request->name,
            'slug' =>  Str::slug($request->name),
        ]);

        if ($district) {
            return redirect()->back()->with('success', 'Data Kecamatan berhasil ubah.');
        }
        return redirect()->back()->with('danger', 'Data Kecamatan gagal ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        $district->delete();
        if ($district) {
            return redirect()->back()->with('success', 'Data Kecamatan berhasil hapus.');
        }
        return redirect()->back()->with('danger', 'Data Kecamatan gagal hapus.');
    }
}
