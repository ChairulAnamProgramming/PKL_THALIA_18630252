<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobApplication;
use App\Models\JobVacancy;
use App\Models\Population;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;

class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jobVacancies'] = JobVacancy::orderBy('id', 'DESC')->get();
        $data['companies'] = Company::orderBy('name', 'ASC')->get();
        return view('backend.pages.job-vacancy.index', $data);
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
            'company_id' => 'required|string|exists:companies,id',
            'name' => 'required|string',
            'quantity' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'effective_date' => 'required|string|max:255',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image')->store('assets/lowongan-kerja', 'public');
        } else {
            $image = 'default.png';
        }

        $jobVacancy = JobVacancy::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
            'uuid' => Str::uuid(),
            'image' => $image,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'salary' => $request->salary,
            'position' => $request->position,
            'location' => $request->location,
            'effective_date' => $request->effective_date,
            'link' => $request->link,
        ]);

        if ($jobVacancy) {
            return redirect()->back()->with('success', 'Data lowongan pekerjaan berhasil di tambahkan.');
        }
        return redirect()->back()->with('danger', 'Data lowongan pekerjaan gagal di tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $data['jobVacancy'] = JobVacancy::where('uuid', $uuid)->first();
        $data['population'] = Population::find(Auth::user()->id);
        if ($data['population']) {
            $data['job_application'] = JobApplication::where('job_vacancie_id', $data['jobVacancy']->id)
                ->where('population_id', $data['population']->id)->first();
        }
        return view('backend.pages.job-vacancy.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(JobVacancy $jobVacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobVacancy $jobVacancy)
    {
        $request->validate([
            'company_id' => 'required|string|exists:companies,id',
            'name' => 'required|string',
            'quantity' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'effective_date' => 'required|string|max:255',
        ]);

        if ($request->file('image')) {
            if ($jobVacancy->image !== 'default.png') {
                File::delete('storage/' . $jobVacancy->image);
            }
            $image = $request->file('image')->store('assets/lowongan-kerja', 'public');
        } else {
            $image = $jobVacancy->image;
        }

        $jobVacancy->update([
            'company_id' => $request->company_id,
            'name' => $request->name,
            'uuid' =>  Str::uuid(),
            'image' => $image,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'salary' => $request->salary,
            'position' => $request->position,
            'location' => $request->location,
            'effective_date' => $request->effective_date,
            'link' => $request->link,
        ]);

        if ($jobVacancy) {
            return redirect()->back()->with('success', 'Data lowongan pekerjaan berhasil di ubah.');
        }
        return redirect()->back()->with('danger', 'Data lowongan pekerjaan gagal di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobVacancy $jobVacancy)
    {
        if ($jobVacancy->image !== 'default.png') {
            File::delete('storage/' . $jobVacancy->image);
        }

        $jobVacancy->delete();

        if ($jobVacancy) {
            return redirect()->back()->with('success', 'Data lowongan pekerjaan berhasil di ubah.');
        }
        return redirect()->back()->with('danger', 'Data lowongan pekerjaan gagal di ubah.');
    }
}
