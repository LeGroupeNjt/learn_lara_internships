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
  <!--leftmenu-->
    <link type="text/css" media="screen" rel="stylesheet" href="{{ asset('css/colorbox.css')}}" />
	<script type="text/javascript" src="{{ asset('js/jquery.tooltips.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.colorbox.js')}}"></script>
	<script type="text/javascript"> 
		$(document).ready(function(){
			$(".dialog_box3").colorbox({
				onClosed:function()
				{ 
				}

			});
			$(".dialog_box3").colorbox({ width:700, height:450, iframe:true, overlayClose:true, initialWidth:225, initialHeight:100, opacity:0.3}) ;
		});
		$(document).ready(function(){
			$(".dialog_box2").colorbox({ width:640, height:400, iframe:true, overlayClose:true, initialWidth:225, initialHeight:100, opacity:0.3}) ;
			});
	</script>	
  <div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Liste des consultations</h1>
            
        </div><!--pageheader-->
        <form method="POST" id="notifForm23" action="{{url('Consultation/update')}}">
        <div id="contentwrapper" class="contentwrapper">
                
                <div class="">
<!--                 	<h3>Demandes : Toutes</h3> -->
                </div><!--contenttitle-->
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable3">
                    <colgroup>
                    	<col class="con1" width="13%" />
                        <col class="con0" width="13%"/>
                        <col class="con1" width="9%"/>
                        <col class="con0" width="13%"/>
                        <col class="con1" width="5%"/>
						<col class="con1" width="5%"/>
                    </colgroup>
                    <thead>
                        <tr>
                        	<th class="head1">Type</th>
                            <th class="head0">Prix</th>
                            <th class="head0">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="gradeA">
                        @foreach($consultations as $consultation)
                           <td>{{ $consultation->type }}</td>
                           <td>{{ $consultation->prix }}</td>
                        
							<!--<td align="right"></td>-->
							<td align="center" style="position: relative;">
								<a class="zoom-fab zoom-btn-large" onclick="showAction(1)"><img src="/images/icons/icons8-Menu-48.png" ></a>
								<ul class="zoom-menu zoom-menu-1">
									<li><a class="zoom-fab zoom-btn-sm1 scale-transition scale-out" href="{{action('ConsultationController@edit',$consultation['id'])}}"><img src="/images/icons/modifier.png" alt="Modifier" title="Modifier" /></a></li> 
									<li><a class="zoom-fab zoom-btn-sm1 scale-transition scale-out" href="{{action('ConsultationController@destroy',$consultation['id'])}}"><img src="/images/icons/supprimer.png" alt="Supprimer" title="Supprimer" /> </a></li>  
								</ul>   
							</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
               
                
        </div><!--contentwrapper-->
        </form>
	</div>
  <!-- centercontent --> 
  </div>
<form action="{{url('Patient/destroy')}}" method="post" id="removeForm">
	<input type="hidden" name="removeId" id="removeId">
</form>

<form action="#" method="post" id="enableForm">
	<input type="hidden" name="itemId" id="itemId">
</form>
@endsection