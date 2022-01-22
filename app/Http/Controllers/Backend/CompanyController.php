<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::orderBy('name', 'ASC')->get();
        return view('backend.pages.company.index', $data);
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
            'name' => 'required|string|max:255|unique:companies',
            'type' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'required|string|max:255|email|unique:users',
            'website' => 'required|string|max:255',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image')->store('assets/perusahaan', 'public');
        } else {
            $image = 'default.png';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'rule' => 'company',
        ]);
        if ($user) {
            $company = Company::create([
                'name' => $request->name,
                'user_id' => $user->id,
                'type' => $request->type,
                'slug' => Str::slug($request->name),
                'address' => $request->address,
                'description' => $request->description,
                'phone' => $request->phone,
                'website' => $request->website,
                'image' => $image,
            ]);

            if ($company) {
                return redirect()->back()->with('success', 'Data perusahaan berhasil di tambahkan.');
            }
        }
        return redirect()->back()->with('danger', 'Data perusahaan gagal di tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'website' => 'required|string|max:255',
        ]);

        if ($request->name !== $company->name) {
            $request->validate([
                'name' => 'required|string|max:255|unique:companies',
            ]);
        }

        if ($request->file('image')) {
            if ($request->file('image') !== 'default.png') {
                File::delete('storage/' . $company->image);
            }
            $image = $request->file('image')->store('assets/perusahaan', 'public');
        } else {
            $image = $company->image;
        }

        $user = User::find($company->user_id)->update([
            'name' => $request->name,
        ]);
        if ($user) {
            $company->update([
                'name' => $request->name,
                'type' => $request->type,
                'slug' => Str::slug($request->name),
                'address' => $request->address,
                'description' => $request->description,
                'phone' => $request->phone,
                'website' => $request->website,
                'image' => $image,
            ]);
            if ($company) {
                return redirect()->back()->with('success', 'Data perusahaan berhasil di update.');
            }
        }
        return redirect()->back()->with('danger', 'Data perusahaan gagal di update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if ($company->image !== 'default.png') {
            File::delete('storage/' . $company->image);
        }
        $user = User::find($company->user_id);
        $user->delete();
        if ($user) {
            return redirect()->back()->with('success', 'Data perusahaan berhasil di hapus.');
        }
        return redirect()->back()->with('danger', 'Data perusahaan gagal di hapus.');
    }
}
