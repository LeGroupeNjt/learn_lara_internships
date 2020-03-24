@extends('layouts.admin')

@section('menuleft')
	<style>
		form select{min-width: initial;}
		form input[type=text]{width: initial;}
	</style>
	<div class="vernav2 iconmenu">
	<ul>
	  <li class=""><a href="#formsub7" class="pub">Consultation</a> <span class="arrow"></span>
		<ul id="formsub7">
		  <li class=""><a href="{{url('Consultation/consultations')}}">Liste consultations</a></li>
		  <li class=""><a href="{{url('Consultation/create')}}">Ajouter Consultation</a></li>
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
            <h1 class="pagetitle">Ajouter Consultation</h1>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                
               <form class="stdform" action="{{url('Consultation/store')}}" method="POST">
               @csrf
                        <p>
                        	<label>Type: </label>
                          <input type="text" name="type" class="smallinput" style="width:150px;" autocomplete="off" required="required">
                        </p>               
                        <p>
                        	<label>Prix : </label>
                            <input type="text" name="prix" id="prix" class="smallinput" style="width:150px;" autocomplete="off" required="required">
                        </p>
                        <p class="stdformbutton">
                        	<input type="submit" onClick="alert('Consultation ajoutée avec succés');" name="Enregistrer" id="greenbtn" value="Enregistrer" class="ui-button ui-widget ui-state-default ui-corner-all" style="height: 30px; width:100px;">
                        </p>
                    </form>
		</div>
	</div>
@endsection