<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use App\Models\Population;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JobSeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jobSeekers'] = JobSeeker::orderBy('id', 'DESC')->get();
        return view('backend.pages.job-seeker.index', $data);
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
            'population_id' => 'required|string|max:255|exists:populations,id',
            'effective_date' => 'required|string|max:255'
        ]);
        $population = Population::find($request->population_id);
        $firstNumberNIK = substr($population->nik, 0, 4);
        $secondNumberDate = date('dmy');
        $treeNumber = 'TA';

        $jobSeeker = JobSeeker::first();
        if (!$jobSeeker) {
            $number =  $firstNumberNIK . $secondNumberDate . $treeNumber . '001';
        } else {
            $number = $this->autonumber($jobSeeker->number, 12, 3);
        }
        $result = JobSeeker::create([
            'population_id' => $population->id,
            'number' => $number,
            'effective_date' => $request->effective_date,
        ]);

        if ($result) {
            return redirect()->route('job_seeker.show', Crypt::encrypt($population->id))->with('success', 'Berhasil membuat kartu kuning.');
        }
        return redirect()->back()->with('danger', 'Gagal membuat kartu kuning.');
    }

    private function autonumber($id_terakhir, $panjang_kode, $panjang_angka)
    {

        // mengambil nilai kode ex: KNS0015 hasil KNS
        $kode = substr($id_terakhir, 0, $panjang_kode);

        // mengambil nilai angka
        // ex: KNS0015 hasilnya 0015
        $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

        // menambahkan nilai angka dengan 1
        // kemudian memberikan string 0 agar panjang string angka menjadi 4
        // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
        // sehingga menjadi 0006
        $angka_baru = str_repeat("0", $panjang_angka - strlen($angka + 1)) . ($angka + 1);

        // menggabungkan kode dengan nilang angka baru
        $id_baru = $kode . $angka_baru;

        return $id_baru;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data['population'] = Population::find($id);
        return view('backend.pages.job-seeker.print', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function edit(JobSeeker $jobSeeker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobSeeker $jobSeeker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobSeeker $jobSeeker)
    {
        $jobSeeker->delete();
        if ($jobSeeker) {
            return redirect()->back()->with('success', 'Data ak1 telah di hapus.');
        }
        return redirect()->back()->with('danger', 'Gagal menghapus data ak1.');
    }
}
