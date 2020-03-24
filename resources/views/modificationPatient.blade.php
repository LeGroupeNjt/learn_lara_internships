@extends('layouts.admin')

@section('menuleft')
	<style>
		form select{min-width: initial;}
		form input[type=text]{width: initial;}
	</style>
	<div class="vernav2 iconmenu">
	<ul>
	  <li class=""><a href="#formsub7" class="pub">Patient</a> <span class="arrow"></span>
		<ul id="formsub7">
		  <li class=""><a href="{{url('Patient/patient')}}">Liste Patients</a></li>
		  <li class=""><a href="{{url('Patient/create')}}">Ajouter Patient</a></li>
		</ul>
	  </li>
	 </ul>
	<a class="togglemenu"></a> <br />
	<br />
	</div>
@endsection

@section('content')
<style>  
input.pickerDate{
	background-image: url("/../images/icons/calendar.png") !important;
    background-position: 5px 7px !important;
    background-repeat: no-repeat !important;
    padding-left: 27px !important;
    width: 100px !important;
}
.select7 {
    height: 31px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 12px;
    margin: 0;
    background: #fcfcfc none repeat scroll 0 0;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-shadow: 1px 1px 2px #ddd inset;
    color: #666;
    min-width: 10%;
    padding: 5px 2px;
}
.width100, form input.width100 {
    width: 100px !important;
    height: 18px;
}
</style>
  	<script type="text/javascript" src="{{ asset('ckeditor4/ckeditor.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css')}}" type="text/css" />
  <div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Modifier Patient</h1>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                
               <form class="stdform" action="{{action('PatientController@update',$patient['id'])}}" method="POST">
               @csrf
                        <p>
                        	<label>Nom : </label>
                          <input type="text" name="nom" class="smallinput" style="width:150px;" autocomplete="off" required="required" value="{{$patient->nom}}" >
                        </p>               
                        <p>
                        	<label>Prenom : </label>
                            <input type="text" name="prenom" id="prenom" class="smallinput" style="width:150px;" autocomplete="off" required="required" value="{{$patient->prenom}}" >
                        </p>
                        <p>
                        	<label>Sexe : </label>
                            @if($patient->sexe=='H')
                            <input type="radio" name="sexe" id="homme" value="H" class="smallinput" checked> Homme &nbsp; &nbsp; &nbsp;
                            <input type="radio" name="sexe" id="femme" value="F" class="smallinput"> Femme
                            @endif
                            @if($patient->sexe=='F')
                            <input type="radio" name="sexe" id="homme" value="H" class="smallinput"> Homme &nbsp; &nbsp; &nbsp;
                            <input type="radio" name="sexe" id="femme" value="F" class="smallinput" checked> Femme
                            @endif
                        </p>               
                        <p>
                        	<label>Age : </label>
                            <span class="field">
							               	<input type="text" name="age" id="age" class="smallinput" autocomplete="off" required="required" value="{{$patient->age}}" >
                            </span>
                        </p>
                        <p>
                        	<label>Numero de téléphone :</label>
                            <span class="field">
                              <input type="text" name="numtele" id="numtele" class="smallinput" autocomplete="off" required="required" value="{{$patient->numtele}}" >
                        
                            </span>
                        </p>                    
                        <p>
                        	<label>CIN : </label>
						              	<input type="text" name="cin" id="cin" class="smallinput" autocomplete="off" value="{{$patient->cin}}" >
                        </p>

                        <p class="stdformbutton">
                        	<input type="submit" onClick="alert('Patient modifié avec succés');" name="Enregistrer" id="greenbtn" value="Enregistrer" class="ui-button ui-widget ui-state-default ui-corner-all" style="height: 30px; width:100px;">
                        </p>
                    </form>
		</div>
	</div>
@endsection