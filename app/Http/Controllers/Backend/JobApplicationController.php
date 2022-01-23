<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobApplication;
use App\Models\JobVacancy;
use App\Models\Population;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->rule);
        switch (Auth::user()->rule) {
            case 'admin':
                $data['jobApplications'] = JobApplication::with('jobVacancy')->orderBy('id', 'DESC')->get();
                break;
            case 'company':
                $company = Company::where('user_id', Auth::user()->id)->first();
                $jobVacancies = JobVacancy::where('company_id', $company->id)->first();
                $data['jobApplications'] = $jobVacancies->jobApplications;
                break;
            case 'user':
                $population = Population::where('user_id', Auth::user()->id)->first();
                if ($population) {
                    $data['jobApplications'] = JobApplication::where('popuation_id', $population->id)->get();
                } else {
                    $data['jobApplications'] = null;
                }
                break;
            default:
                $data['jobApplications'] = JobApplication::orderBy('id', 'DESC')->get();
                break;
        }
        return view('backend.pages.job-application.index', $data);
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
        try {
            $request->validate([
                'job_vacancie_id' => 'required|exists:job_vacancies,id',
            ]);
            $population = Population::find(Auth::user()->id);
            $jobApplication = JobApplication::create([
                'job_vacancie_id' => $request->job_vacancie_id,
                'population_id' => $population->id,
                'status' => 'panding',
            ]);
            if ($jobApplication) {
                return redirect()->back()->with('success', 'Pengajuan lamaran kerja berhasil di kirim.');
            }
            return redirect()->back()->with('danger', 'Pengajuan lamaran kerja gagal di kirim.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Gagal memuat, coba kembali nanti.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data['jobApplication'] = JobApplication::find($id);
        return view('backend.pages.job-application.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobApplication $jobApplication)
    {
        try {
            $status = Crypt::decrypt($request->status);
            $jobApplication->update([
                'status' => $status,
            ]);
            if ($jobApplication) {
                return redirect()->back()->with('success', 'Pengajuan lamaran kerja berhasil di ' . $status . '.');
            }
            return redirect()->back()->with('danger', 'Pengajuan lamaran kerja gagal di ' . $status . '.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Gagal memuat, coba kembali nanti.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobApplication $jobApplication)
    {
        //
    }
}
