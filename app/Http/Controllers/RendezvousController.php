<?php

namespace App\Http\Controllers;
use App\Rendezvous;
use Illuminate\Http\Request;

class RendezvousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$rendezvous = Rendezvous::all();
        foreach ($rendezvous as $rendezvous) {
          echo $rendezvous->daterendezvous.'<br>';
        }*/
        return view('listerendezvous', ['rendezvous' => Rendezvous::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home', ['rendezvous' => Rendezvous::all()]);
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
            'id_patient'=>'required',
            'id_consultation'=>'required',
            'daterendezvous' => 'required',
            'description'=>'required'
          ]);
        $rendezvous = new Rendezvous([
            'id_patient'=> $request->get('id_patient'),
            'id_consultation' => $request->get('id_consultation'),
            'daterendezvous'=> $request->get('daterendezvous'),
            'description'=> $request->get('description'),
        ]);
        $rendezvous->save();
        return view('home', ['rendezvous' => Rendezvous::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('rendezvous', ['rendezvous' => Rendezvous::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rendezvous=Rendezvous::find($id);
       return view('rendezvous',compact('rendezvous','id'));
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
        $this->validate($request,['description'=> 'required',
        'daterendezvous'=> 'required',
        'id_patient'=> 'required',
        'id_consultation'=> 'required'
        
        ]);
        $rendezvous=Rendezvous::find($id);
        $rendezvous->description=$request->get('description'); 
        $rendezvous->daterendezvous=$request->get('daterendezvous');
        $rendezvous->id_patient=$request->get('id_patient')  ; 
        $rendezvous->id_consultation=$request->get('id_consultation')  ; 
        $rendezvous->save();
          /*Patient::where('id', $id)->update($request->all());
        */
        return view('home', ['rendezvous' => Rendezvous::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rendezvous = Rendezvous::findOrFail($id);
        $rendezvous->delete();
        return view('listerendezvous', ['rendezvous' => Rendezvous::all()]);
    }

}
