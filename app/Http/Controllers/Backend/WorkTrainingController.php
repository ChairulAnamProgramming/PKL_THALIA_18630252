<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\WorkTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class WorkTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['workTrainings'] = WorkTraining::orderBy('id', 'DESC')->get();
        $data['educations'] = Education::orderBy('name', 'ASC')->get();
        return view('backend.pages.work-training.index', $data);
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
            'agency_name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|string|max:255|email',
            'phone' => 'required|string|max:15',
            'education_id' => 'required|string|exists:education,id',
            'effective_date' => 'required|string',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image')->store('assets/pelatihan-kerja', 'public');
        } else {
            $image = 'assets/pelatihan-kerja/default.png';
        }

        $workTraining = WorkTraining::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'agency_name' => $request->agency_name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'education_id' => $request->education_id,
            'effective_date' => $request->effective_date,
            'image' => $image,
        ]);

        if ($workTraining) {
            return redirect()->back()->with('success', 'Data pelatihan kerja berhasil di tambahkan.');
        }
        return redirect()->back()->with('danger', 'Data pelatihan kerja gagal di tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkTraining $workTraining)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'agency_name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|string|max:255|email',
            'phone' => 'required|string|max:15',
            'education_id' => 'required|string|exists:education,id',
            'effective_date' => 'required|string',
        ]);

        if ($request->file('image')) {
            if ($request->file('image') !== 'assets/pelatihan-kerja/default.png') {
                File::delete('storage/' . $workTraining->image);
            }
            $image = $request->file('image')->store('assets/pelatihan-kerja', 'public');
        } else {
            $image = $workTraining->image;
        }

        $workTraining->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'agency_name' => $request->agency_name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'education_id' => $request->education_id,
            'effective_date' => $request->effective_date,
            'image' => $image,
        ]);

        if ($workTraining) {
            return redirect()->back()->with('success', 'Data pelatihan kerja berhasil di ubah.');
        }
        return redirect()->back()->with('danger', 'Data pelatihan kerja gagal di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkTraining $workTraining)
    {
        if ($workTraining->image !== 'assets/pelatihan-kerja/default.png') {
            File::delete('storage/' . $workTraining->image);
        }
        $workTraining->delete();
        if ($workTraining) {
            return redirect()->back()->with('success', 'Data pelatihan kerja berhasil di hapus.');
        }
        return redirect()->back()->with('danger', 'Data pelatihan kerja gagal di hapus.');
    }
}
