<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petition;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = petition::orderBy('type', 'DESC')->paginate();
        return view('petition.index', compact('petitions'));
    }

    public function index2()
    {
        $petitions =petition::orderBy('type', 'DESC')->orderBy('id_grade', 'DESC')->paginate();
        return view('listtwo.index', compact('petitions'));
    }


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
}

