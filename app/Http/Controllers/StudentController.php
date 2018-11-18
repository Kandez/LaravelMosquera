<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use App\grade;
use App\studies;

class StudentController extends Controller{
    public function index(){
        $students = student::orderBy('lastname', 'asc')->orderBy('name', 'asc')->get();

        return view('student.index', compact('students', 'studies'));
    }
    
    public function indexStudies($id){
        $student = student::find($id);
        $studies = studies::where('id_student', $id)->with('grade')->get();
        return view('student.delete', compact('student', 'studies'));
    }

    public function create(){
        $grades = grade::orderBy('level', 'asc')->orderBy('name', 'asc')->get();
        return view('student.create', compact('grades'));
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

        $idStudent = student::orderBy('id', 'desc')->first();

        foreach (($request->get('id_grade')) as $ids) {
            $id = (int) $ids;
            $studies = new studies([
                'id_student'=> $idStudent->id,
                'id_grade'=> $id
            ]);
            $studies->save();
        };

        return redirect()->route('students')->with('success', 'Se ha añadido un nuevo estudiante.');
    }

    public function show($id){}
 
    public function edit($id){
        $student = student::find($id);
        $grades = grade::orderBy('level', 'asc')->orderBy('name', 'asc')->get();

        return view('student.edit', compact('student', 'grades'));
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

        foreach (($request->get('id_grade')) as $ids) {
            $id = (int) $ids;
            $studies = new studies([
                'id_student'=> $student->id,
                'id_grade'=> $id
            ]);
            $studies->save();
        };

        return redirect('/students')->with('success', 'El estudiante se ha actualizado.');
    }
 
    public function destroy($id){
        $student = student::find($id);
        $student->delete();

        return redirect('/students')->with('success', 'El alumno ha sido eliminado.');
    }

    public function destroyStudie($id){
        $studie = studies::find($id);
        $studie->delete();

        return redirect('/students')->with('success', 'El curso ha sido eliminado.');
    }
}