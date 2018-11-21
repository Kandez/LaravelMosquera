<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petition;
use App\grade;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = petition::with('companies','grades')->orderBy('type', 'DESC')->paginate();
        //dd($petitions);
        $grades = grade::all();
        return view('petition.index', compact('petitions','grades'));
    }

    // public function index2()
    // {
    //     $petitions =petition::orderBy('type', 'DESC')->orderBy('id_grade', 'DESC')->paginate();
    //     return view('listtwo.index', compact('petitions'));
    // }


    public function create()
    {
        return view('petition.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'=>'required',
            'n_students'=> 'required'
        ]);
        $petition = new petition([
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
        return view('petition.edit', compact('petition'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type'=>'required',
            'n_students'=> 'required'
        ]);

        $petition = petition::find($id);
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

    public function listone(Request $req1, Request $req2)
    {
        $petitions=petition::where($petition->$timestamps->create_at->between($req1,$req2))-orderBy('type')->with('companies')->get();
        return view('petition.index', compact('companies'));
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

