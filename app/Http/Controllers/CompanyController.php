<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:companies',
            'email' => 'required|email|unique:companies',
            'logo' => 'image|dimensions:min_width=100,min_height=100',
            'website' => 'required|url|unique:companies',
        ]);

        $logoPath = $request->file('logo') ? $request->file('logo')->store('public/logos') : null;

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoPath,
            'website' => $request->website,
        ]);

        return redirect()->route('companies.index');
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|unique:companies,name,' . $company->id,
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'logo' => 'image|dimensions:min_width=100,min_height=100',
            'website' => 'required|url|unique:companies,website,' . $company->id,
        ]);

        if ($request->hasFile('logo')) {
            Storage::delete($company->logo);
            $company->logo = $request->file('logo')->store('public/logos');
        }

        $company->update($request->only(['name', 'email', 'website']));

        return redirect()->route('companies.index');
    }

    public function destroy(Company $company)
    {
        Storage::delete($company->logo);
        $company->delete();
        return redirect()->route('companies.index');
    }
}

