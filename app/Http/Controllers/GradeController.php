<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\grade;
use App\student;

class GradeController extends Controller{
    public function index(){
        $grades = grade::orderBy('level', 'asc')->orderBy('name', 'asc')->get();
        $students = student::orderBy('lastname', 'asc')->orderBy('name', 'asc')->get();

        return view('grade.index', compact('grades', 'students'));
    }

    public function create(){
        return view('grade.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'level'=> 'required'
          ]);
          $grade = new grade([
            'name' => $request->get('name'),
            'level'=> $request->get('level')
          ]);
          $grade->save();
          return redirect()->route('grades')->with('success', 'Se ha añadido un nuevo ciclo.');
    }

    public function show($id){
    }
 
    public function edit($id){
        $grade = grade::find($id);

        return view('grade.edit', compact('grade'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'level'=> 'required'
          ]);
    
          $grade = grade::find($id);
          $grade->name = $request->get('name');
          $grade->level = $request->get('level');
          $grade->save();
    
          return redirect('/grades')->with('success', 'El ciclo se ha actualizado.');
    }
 
    public function destroy($id){
        $grade = grade::find($id);
        $grade->delete();

        return redirect('/grades')->with('success', 'El ciclo ha sido eliminado.');
    }
}
