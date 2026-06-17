<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $companies = CompanyProfile::all();

        return view(
            'admin.company_profiles.index',
            compact('companies')
        );
    }

    public function create()
    {
        return view(
            'admin.company_profiles.create'
        );
    }

    public function store(Request $request)
    {
      $request->validate([
        'nama_perusahaan' => 'required',
        'tentang' => 'required',
        'visi' => 'required',
        'misi' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
        'email' => 'required',
        'logo' => 'nullable|file'
]);

        $logo = null;

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $logo = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/company'),
                $logo
            );
        }

        CompanyProfile::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'tentang' => $request->tentang,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'logo' => $logo
        ]);

        return redirect('/admin/company-profiles')
            ->with(
                'success',
                'Profil perusahaan berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $company = CompanyProfile::findOrFail($id);

        return view(
            'admin.company_profiles.edit',
            compact('company')
        );
    }

    public function update(Request $request, $id)
    {
        $company = CompanyProfile::findOrFail($id);

        $logo = $company->logo;

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $logo = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/company'),
                $logo
            );
        }

        $company->update([
           'nama_perusahaan' => $request->nama_perusahaan,
            'tentang' => $request->tentang,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'logo' => $logo
        ]);

        return redirect('/admin/company-profiles')
            ->with(
                'success',
                'Profil perusahaan berhasil diperbarui'
            );
    }

    public function destroy($id)
    {
        CompanyProfile::destroy($id);

        return redirect('/admin/company-profiles')
            ->with(
                'success',
                'Profil perusahaan berhasil dihapus'
            );
    }
}