<?php

namespace App\Http\Controllers;
use App\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listeconsultation', ['consultations' => Consultation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'=>'required',
            'prix'=>'required'
          ]);
        $consultation = new Consultation([
            'type'=> $request->get('type'),
            'prix' => $request->get('prix')
        ]);
        $consultation->save();
        return view('/consultation')->with('success', 'Consultation ajoutée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultation=Consultation::find($id);
        return view('modificationconsultation',compact('consultation','id'));
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
        $this->validate($request,['type'=> 'required',
        'prix'=> 'required'
        ]);
        $consultation=Consultation::find($id);
        $consultation->type=$request->get('type'); 
        $consultation->prix=$request->get('prix');
        $consultation->save();
          /*Patient::where('id', $id)->update($request->all());
        */
        return view('listeconsultation', ['consultations' => Consultation::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultation =Consultation::findOrFail($id);
        $consultation->delete();
        return view('listeconsultation', ['consultations' => Consultation::all()]);
    }
}
