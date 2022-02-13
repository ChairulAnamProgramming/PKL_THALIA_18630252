<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Education;
use App\Models\JobApplication;
use App\Models\JobSeeker;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ReportController extends Controller
{
    public function index()
    {
        $data['educations'] = Education::all();
        $data['districts'] = District::all();
        return view('backend.pages.reports.index', $data);
    }

    public function jobseeker(Request $request, $type)
    {
        $type = Crypt::decrypt($type);
        switch ($type) {
            case 'education':
                return $this->_education($request);
                break;
            case 'district':
                return $this->_district($request);
                break;
            case 'gender':
                return $this->_gender($request);
                break;

            default:
                return redirect()->back()->with('danger', 'Request tidak falid');
                break;
        }
    }

    private function _education($request)
    {
        $first = $request->date_first;
        $last = $request->date_last;
        $data['date_first'] = $request->date_first;
        $data['date_last'] = $request->date_last;
        $education_id = $request->education_id;
        $education = Education::find($education_id);
        $data['type'] = $education->name;
        $data['title'] = 'Laporan pencari kerja berdasarkan pendidikan';
        $data['items'] = JobSeeker::whereBetween('created_at', [$first, $last])
            ->whereHas('population', function ($q) use ($education_id) {
                return $q->with('education')->where('education_id', $education_id);
            })
            ->get();
        return view('backend.pages.reports.pages.education', $data);
    }

    private function _district($request)
    {
        $first = $request->date_first;
        $last = $request->date_last;
        $data['date_first'] = $request->date_first;
        $data['date_last'] = $request->date_last;

        $district_id = $request->district_id;
        $district = District::find($district_id);
        $data['type'] = $district->name;
        $data['title'] = 'Laporan pencari kerja berdasarkan kecamatan';
        $data['items'] = JobSeeker::whereBetween('created_at', [$first, $last])
            ->whereHas('population', function ($q) use ($district_id) {
                return $q->with('district')->where('district_id', $district_id);
            })
            ->get();
        return view('backend.pages.reports.pages.distrcit', $data);
    }

    private function _gender($request)
    {
        $first = $request->date_first;
        $last = $request->date_last;
        $data['date_first'] = $request->date_first;
        $data['date_last'] = $request->date_last;

        $gender = $request->gender;
        $data['type'] = $gender === 'male' ? 'Laki-laki' : 'Perempuan';
        $data['title'] = 'Laporan pencari kerja berdasarkan jenis kelamin';
        $data['items'] = JobSeeker::whereBetween('created_at', [$first, $last])
            ->whereHas('population', function ($q) use ($gender) {
                return $q->where('gender', $gender);
            })
            ->get();
        return view('backend.pages.reports.pages.gender', $data);
    }

    public function jobvacancy(Request $request, $type)
    {
        $type = Crypt::decrypt($type);
        switch ($type) {
            case 'jobvacancy':
                return $this->_jobvacancy($request);
                break;
            case 'accept':
                return $this->_jobvacancyaccept($request);
                break;

            default:
                return redirect()->back()->with('danger', 'Request tidak falid');
                break;
        }
    }

    private function _jobvacancy($request)
    {
        $first = $request->date_first;
        $last = $request->date_last;
        $data['date_first'] = $request->date_first;
        $data['date_last'] = $request->date_last;

        $data['title'] = 'Laporan rekap data lowongan pekerjaan';
        $data['items'] = JobVacancy::whereBetween('created_at', [$first, $last])->get();
        return view('backend.pages.reports.pages.job-vacancy', $data);
    }
    private function _jobvacancyaccept($request)
    {
        $first = $request->date_first;
        $last = $request->date_last;
        $data['date_first'] = $request->date_first;
        $data['date_last'] = $request->date_last;

        $data['title'] = 'Laporan rekap data lowongan pekerjaan yang telah di terima perusahaan';
        $data['items'] = JobApplication::where('status', 'received')->whereBetween('created_at', [$first, $last])->get();
        return view('backend.pages.reports.pages.job-vacancy-accept', $data);
    }
}
