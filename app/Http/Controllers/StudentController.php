<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class StudentController extends Controller{
    public function index(){
        $students = student::orderBy('lastname', 'asc')->orderBy('name', 'asc')->get();

        return view('student.index', compact('students'));
    }

    public function create(){
        return view('student.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'lastname'=> 'required',
            'age' => 'required|integer'
          ]);
          $student = new student([
            'name' => $request->get('name'),
            'lastname'=> $request->get('lastname'),
            'age'=> $request->get('age')
          ]);
          $student->save();
          return redirect()->route('students')->with('success', 'Se ha añadido un nuevo estudiante.');
    }

    public function show($id){
    }
 
    public function edit($id){
        $student = student::find($id);

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'lastname'=> 'required',
            'age' => 'required|integer'
          ]);
    
          $student = student::find($id);
          $student->name = $request->get('name');
          $student->lastname = $request->get('lastname');
          $student->age = $request->get('age');
          $student->save();
    
          return redirect('/students')->with('success', 'El estudiante se ha actualizado.');
    }
 
    public function destroy($id){
        $student = student::find($id);
        $student->delete();

        return redirect('/students')->with('success', 'El estudiante ha sido eliminado.');
    }
}