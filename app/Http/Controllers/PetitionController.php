<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petition;
use App\grade;
use PDF;
use App\company;
use Carbon\Carbon;

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
        dd(Carbon::parse($req->ffinal)->format('d-m-Y'));
        $fechaFinal = Carbon::parse($req->ffinal)->format('d-m-Y');
        $petitions = petition::where('created_at','>=',$fechaFinal)->where('created_at','<=',$req->fini)->with('companies', 'grades')->get();
        $grades = grade::all();
        $finic=$req->fini;
        $fechaFinal=$req->ffin;
        return view('petition.index', compact('petitions','grades','finic','ffinal'));
    }

    public function listtwo(Request $req)
    {
        $petitions = petition::where('id_grade',$req->id_grade)->orderBy('type')->with('companies','grades')->get();
        $grades = grade::all();
        $idg1=$req->id_grade;
        return view('petition.index', compact('petitions','grades','idg1'));
    }

    public function listthree(Request $req)
    {
        $petitions=petition::where('id_grade', $req->id_grade)->where('type', $req->type)->with('companies', 'grades')->get();
        $grades = grade::all();
        $idg2=$req->id_grade;
        $type=$req->type;
        return view('petition.index', compact('petitions', 'grades','idg2','type'));
    }

    public function generatePDF(Request $req)
    {
        if(isset($req->finic) && isset($req->ffinal)){
            $petitions=petition::wherebetween('created_at',[$req->finic,$req->ffinal])->orderBy('type')->with('companies')->get();
            $nombre='Peticiones entre '. $req->finic .' y '. $req->ffinal .'.pdf';
        } elseif (isset($req->idg1)) {
            $petitions = petition::where('id_grade',$req->idg1)->orderBy('type')->with('companies','grades')->get();
            $nombre='Peticiones por grado.pdf';
        }elseif (isset($req->idg2) && isset($req->type)) {
            $petitions=petition::where('id_grade', $req->idg2)->where('type', $req->type)->with('companies', 'grades')->get();
            $nombre='Peticiones por grado y tipo.pdf';
        }else{
            $petitions = petition::all();
            $nombre='Peticiones.pdf';
        }

        $pdf = PDF::loadView('pdf.pdf', compact('petitions'));

        $pdf->save(storage_path().'_filename.pdf');

        return $pdf->download($nombre);
    }
}