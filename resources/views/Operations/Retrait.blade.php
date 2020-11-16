 @extends('layouts.master')

@section('content')
<div class="form-row">
<div     class="col-9">
         <div class="form-group">
@if(session()->has('success'))
          <div class="alert alert-success" role="alert">
   {{session()->get('success')}}

<script type="text/javascript" language="JavaScript">
success1('le retrait faite avec succes ');
      </script>

      </div>
      @endif

       @if(session()->has('error'))
          <div class="alert alert-warning" role="alert">
   {{session()->get('error')}}

   <script type="text/javascript" language="JavaScript">
error1('erreur');
      </script>

      </div>
      @endif
      <br>
      <h4>Retrait Compte Courant</h4>
</div>

 
<div class="container box">
  
   <div class="form-group">
    <h4></h4>

    <input type="text" name="client_info" id="client_info" class="form-control input-lg" autocomplete="off" placeholder="rechercher un client" />
   
    
   </div>

      <div class="form-group">
         <div id="clientList">
    </div>
      </div>
    </div>
  
  
   <form  action="{{url('Retrait_Compte_Courant')}}" method="post">

<div  id="form_courant"  >

   {{ csrf_field() }}

  <div class="form-row">
     <div class="form-group col-md-3">
      <label for="inputCity">NumCompte</label>
      <input type="text" name="numcompte" class="form-control" id="numcomptes1" readonly>
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Nom</label>
      <input type="text" name="nom" class="form-control" id="nom1" readonly>
    </div>
    
    <div class="form-group col-md-3">
      <label for="inputCity">Prenom</label>
      <input type="text" name="prenom" class="form-control" id="prenom1" readonly>
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Montant</label>
      <input type="text" name="montant" class="form-control"  >
    </div>
  </div>


         <input id="idcomptecourant33" name="idcomptecourant33" type="hidden">

    <button type="submit" class="btn btn-primary">enregistrer</button>


</div>
</form>

</div>
<div  class="col-3">
 <section>
<div class="list-group">
    <div class="p-3 mb-2 bg-light text-dark">
        <h4 >
Options</h4>
    </div>
  <a href="{{url('Effectuer_Virement')}}" class="list-group-item list-group-item-action "><b>Effectuer un Virement</b></a>
  <a href="{{url('Effectuer_Retrait')}}" class="list-group-item bg-success list-group-item-action active"><b>Effectuer un Retrait</b></a>
  <a href="{{url('Effectuer_Viresement')}}" class="list-group-item list-group-item-action"><b>Effectuer un Versement</b></a>

</div>
                </section>
              </div>
          </div>

            <script>
$(document).ready(function(){

 /*$("#form_courant").hide();
    $("#form_epargne").hide();*/



 $('#client_info').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('Comptes.Create_Compte.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#clientList').fadeIn();  
                    $('#clientList').html(data);
                   

          }
         });
        }
    });

    $(document).on('click', 'a', function(){  
        $('#client_info').val($(this).text());  
        var str = $(this).text();
        var array = str.split(":");
                $('#idcompte22').val($('#idcompte11').val()); 
               $('#idcompte33').val($('#idcompte11').val());  
              
               $('#numcomptes1').val($('#numcomptes0').val()); 
               $('#nom1').val($('#nom0').val());  
               $('#prenom1').val($('#prenom0').val());  
               $('#idcomptecourant33').val($('#idcomptecourant11').val()); 
        $('#clientList').fadeOut();  
    }); 
        console.log( "ready!" );
 

});
 


        //this code gets the value of the select when ever it changed
     /*   $('#typecompte').change(function(){
          var typecompte = $('#typecompte').val();
          //alert(annee+' '+semain);
          //ajax code that send choix value to a php file and return the result into #write div
          if(typecompte=="1")
         {$("#form_courant").show();
    $("#form_epargne").hide();
     } else if(typecompte=="2"){
      $("#form_epargne").show();
              $("#form_courant").hide();

     }

        });*/
  </script>
@endsection
