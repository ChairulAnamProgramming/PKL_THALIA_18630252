<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ReportController extends Controller
{
    public function index()
    {
        $data['educations'] = Education::all();
        return view('backend.pages.reports.index', $data);
    }

    public function education(Request $request, $type)
    {
        $type = Crypt::decrypt($type);
        switch ($type) {
            case 'education':
                return $this->_education($request);
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
        $data['title'] = 'Laporan Pencari Kerja berdasarkan pendidikan';
        $data['items'] = JobSeeker::whereBetween('created_at', [$first, $last])
            ->whereHas('population', function ($q) use ($education_id) {
                return $q->with('education')->where('education_id', $education_id);
            })
            ->get();
        return view('backend.pages.reports.pages.job-seeker', $data);
    }
}
