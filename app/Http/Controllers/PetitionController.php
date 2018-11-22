<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petition;
use App\grade;
use App\company;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = petition::with('companies','grades')->orderBy('type', 'DESC')->paginate();
        $grades = grade::all();
        return view('petition.index', compact('petitions','grades'));
    }

    public function create()
    {
        $grades=grade::orderBy('level', 'desc')->get();
        $companies=company::all();
        return view('petition.create', compact('grades','companies'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'id_grade' => 'required',
            'id_company' => 'required',
            'type'=>'required',
            'n_students'=> 'required'
        ]);
        $petition = new petition([

            'id_grade' => $request->get('id_grade'),
            'id_company' => $request->get('id_company'),
            'type' => $request->get('type'),
            'n_students'=> $request->get('n_students')
        ]);
        $petition->save();
        return redirect()->route('petitions')->with('success', 'Se ha añadido una peticion');
    }

    public function show($id){
    }

    public function edit($id)
    {
        $petition = petition::find($id);
        $grades = grade::all();
        $companies = company::all();
        return view('petition.edit', compact('petition','grades','companies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_grade' =>'required',
            'id_company' =>'required',
            'type'=>'required',
            'n_students'=> 'required'
        ]);

        $petition = petition::find($id);
        $petition->id_grade = $request->get('id_grade');
        $petition->id_company = $request->get('id_company');
        $petition->type = $request->get('type');
        $petition->n_students = $request->get('n_students');
        $petition->save();

        return redirect('/petitions')->with('success', 'Peticion actualizada');
    }

    public function destroy($id)
    {
        $petition = petition::find($id);
        $petition->delete();

        return redirect('/petitions')->with('success', 'Peticion borrada');
    }

    public function listone(Request $req)
    {
        $petitions=petition::wherebetween('created_at',[$req->fini,$req->ffin])->orderBy('type')->with('companies')->get();
        $grades = grade::all();
        return view('petition.index', compact('petitions','grades'));
    }

    public function listtwo(Request $req)
    {
        $petitions = petition::where('id_grade',$req->id_grade)->orderBy('type')->with('companies','grades')->get();
        $grades = grade::all();
        return view('petition.index', compact('petitions','grades'));
    }

    public function listthree(Request $req)
    {
        $petitions=petition::where('id_grade', $req->id_grade)->where('type', $req->type)->with('companies', 'grades')->get();
        $grades = grade::all();
        return view('petition.index', compact('petitions', 'grades'));
    }


}

