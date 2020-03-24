<?php

namespace App\Http\Controllers;
use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listepatient', ['patients' => Patient::all()]);
        //  return view('listepatient');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'datenaissance' => 'required',
            'sexe'=>'required',
            'age'=>'required',
            'numtele'=>'required',
            'cin'=>'required'
          ]);*/
        $patient = new Patient([
            'nom'=> $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'age'=> $request->get('age'),
            'sexe'=> $request->get('sexe'),
            'numtele'=> $request->get('numtele'),
            'cin'=> $request->get('cin')
        ]);
        $patient->save();
        return view('/patient')->with('success', 'Patient ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('patient', ['patient' => Patient::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient=Patient::find($id);
       return view('modificationPatient',compact('patient','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['nom'=> 'required',
        'prenom'=> 'required',
        'age'=> 'required',
        'sexe'=> 'required',
        'numtele'=> 'required'
        ]);
        $patient=Patient::find($id);
        $patient->nom=$request->get('nom'); 
        $patient->prenom=$request->get('prenom');
        $patient->age=$request->get('age')  ; 
        $patient->sexe=$request->get('sexe')  ; 
        $patient->numtele=$request->get('numtele');
        $patient->cin=$request->get('cin')  ;  
        $patient->save();
          /*Patient::where('id', $id)->update($request->all());
        */
        return view('listepatient', ['patients' => Patient::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return view('listepatient', ['patients' => Patient::all()]);
    }
}
