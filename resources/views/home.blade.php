@extends('layouts.admin')
@section('menuleft')
	<style>
		form select{min-width: initial;}
		form input[type=text]{width: initial;}
	</style>
	<div class="vernav2 iconmenu">
    <ul>
	  <li class=""><a href="" class="pub">Rendezvous</a> <span class="arrow"></span>
		<ul id="formsub7">
		  <li class=""><a href="{{url('Rendezvous/store')}}">Liste Rendezvous</a></li>
		  <li class=""><a href="{{url('Rendezvous/create')}}">Ajouter Rendezvous</a></li>
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
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($rendezvous as $rendezvous)
                {
                    title : '{{ $rendezvous->description }}',
                    start : '{{ $rendezvous->daterendezvous }}',
                    url : "{{ url('Rendezvous/edit', $rendezvous->id) }}"
                },
                @endforeach
            ]
        })
    });
</script>   
<link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css')}}" type="text/css" />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
  <div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Calendrier</h1>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
       <form class="stdform" action="{{url('Rendezvous/store')}}" method="POST">
               @csrf               
                        <p>
                        	<label>Patient : </label>
                           <?php
                           try{
                              $db=new PDO('mysql:host=localhost;dbname=gestion_rendezvous;','root','');
                              $req=$db->query('select * from patients');
                              echo '<select name="id_patient">';
                              while($don=$req->fetch())
                              { 
                                   echo '<option value='.$don['id'].'>'.$don['nom'].' '.$don['prenom'].'</option>';
                              }
                              echo '</select>'; 
                              $req->closeCursor();
                           }
                           catch(Exception $ex)
                           {
                             die('Erreur : '.$ex);
                           }
                           ?>
                        </p>
                        <p>
                        	<label> Consultation : </label>
                           <?php
                           try{
                              $db=new PDO('mysql:host=localhost;dbname=gestion_rendezvous;','root','');
                              $req=$db->query('select * from consultations');
                              echo '<select name="id_consultation">';
                              while($don=$req->fetch())
                              {

                                   echo '<option value="'.$don['id'].'">'.$don['type'].'</option>';
                              }
                              echo '</select>'; 
                              $req->closeCursor();
                           }
                           catch(Exception $ex)
                           {
                             die('Erreur : '.$ex);
                           }
                           ?>
                        </p>
                        <p>
                        	<label>Date Rendez vous : </label>
                          <input type="datetime-local" name="daterendezvous" id="daterendezvous" class="smallinput" style="width:150px;"/>
                        </p>
                        <p>
                        	<label>Description : </label>
                          <textarea name="description"  row="20" col="30" class="smallinput" style="width:150px;" autocomplete="off" ></textarea>
                        </p> 
                        <p class="stdformbutton">
                        	<input   style="margin-right:150px;width:250px;height:50px;background-color:#FF8C00;display:table-cell;vertical-align:middle;text-align:center;color:white;font-weight:bold;font-size:20px;"type="submit" onClick="alert('Rendez-vous ajouté avec succés');"  id="greenbtn" value="Ajouter" class="ui-button ui-widget ui-state-default ui-corner-all" style="height: 30px; width:100px;">
                        </p>
                        <div style="margin-left:220px;width:250px;height:40px;background-color:#FF8C00;padding-top:12px;text-align:center;"> <a style="color:white;font-weight:bold;font-size:20px;" href="{{url('Rendezvous/rendezvous')}}">Liste Rendezvous</a></div><br/><br/>
                    </form>
        <div id='calendar' style="width:750px; "></div>
		</div>
	</div>
@endsection