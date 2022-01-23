<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Education;
use App\Models\Population;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;

class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['populations'] = Population::orderBy('name', 'ASC')->get();
        $data['districts'] = District::orderBy('name', 'ASC')->get();
        $data['educations'] = Education::orderBy('name', 'ASC')->get();
        return view('backend.pages.population.index', $data);
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
            'district_id' => 'required|string|max:255|exists:districts,id',
            'education_id' => 'required|string|max:255|exists:education,id',
            'email' => 'required|string|max:255',
            'nik' => 'required|string|max:255|unique:populations',
            'phone' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'gender' => 'required|string|max:255|in:male,female',
            'marital_status' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        if ($request->file('image')) {
            $request->validate([
                'image' => 'required|'
            ]);
            $image = $request->file('image')->store('assets/population', 'public');
        } else {
            $image = 'assets/population/default.png';
        }

        if ($request->statue_form) {
            $user = User::find(Auth::user()->id);
            $user->update([
                'name' => $request->name,
            ]);
        } else {
            $request->validate([
                'email' => 'unique:users',
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->nik),
                'rule' => 'user',
            ]);
        }

        if ($user) {
            $population = Population::create([
                'user_id' => $user->id,
                'district_id' => $request->district_id,
                'education_id' => $request->education_id,
                'name' => $request->name,
                'nik' => $request->nik,
                'phone' => $request->phone,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'marital_status' => $request->marital_status,
                'religion' => $request->religion,
                'address' => $request->address,
                'image' => $image,
            ]);

            if ($population) {
                return redirect()->back()->with('success', 'Data masyarakat berhasil di tambahkan.');
            }
        }
        return redirect()->back()->with('danger', 'Data masyarakat gagal di tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function show(Population $population)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function edit(Population $population)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Population $population)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'district_id' => 'required|string|max:255|exists:districts,id',
            'education_id' => 'required|string|max:255|exists:education,id',
            'phone' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'gender' => 'required|string|max:255|in:male,female',
            'marital_status' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        if ($request->file('image')) {
            $request->validate([
                'image' => 'required'

            ]);
            if ($population->image !== 'default.png') {
                File::delete('storage/' . $population->image);
            }
            $image = $request->file('image')->store('assets/population', 'public');
        } else {
            $image =  $population->image;
        }

        $user = User::find($population->user_id)->update([
            'name' => $request->name,
        ]);

        if ($user) {
            $population->update([
                'district_id' => $request->district_id,
                'education_id' => $request->education_id,
                'name' => $request->name,
                'phone' => $request->phone,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'marital_status' => $request->marital_status,
                'religion' => $request->religion,
                'address' => $request->address,
                'image' => $image,
            ]);

            if ($population) {
                return redirect()->back()->with('success', 'Data masyarakat berhasil di ubah.');
            }
        }
        return redirect()->back()->with('danger', 'Data masyarakat gagal di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function destroy(Population $population)
    {
        if ($population->image !== 'default.png') {
            File::delete('storage/' . $population->image);
        }
        $user = User::find($population->user_id);
        $user->delete();
        if ($population) {
            return redirect()->back()->with('success', 'Data masyarakat berhasil di hapus.');
        }
        return redirect()->back()->with('danger', 'Data masyarakat gagal di hapus.');
    }
}
