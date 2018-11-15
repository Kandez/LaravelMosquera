<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\company;

class CompanyController extends Controller

{
    public function index()
    {
        $companies = company::orderBy('name')->paginate();
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'city'=> 'required',
            'cp' => 'required'
        ]);
        $company = new company([
            'name' => $request->get('name'),
            'city'=> $request->get('city'),
            'cp'=> $request->get('cp')
        ]);
        $company->save();
        return redirect()->route('companies')->with('success', 'Se ha añadido una compañia');
    }

    public function show($id){
    }

    public function edit($id)
    {
        $company = company::find($id);
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'city'=> 'required',
            'cp' => 'required'
        ]);

        $company = company::find($id);
        $company->name = $request->get('name');
        $company->city = $request->get('city');
        $company->cp = $request->get('cp');
        $company->save();

        return redirect('/companies')->with('success', 'Compañia actualizada');
    }

    public function destroy($id)
    {
        $company = company::find($id);
        $company->delete();

        return redirect('/companies')->with('success', 'Compañia borrada');
    }
}