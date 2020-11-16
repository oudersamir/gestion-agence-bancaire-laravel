@extends('layouts.master')

@section('content')

<div class="form-row">
<div     class="col-9">
   @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
   {{session()->get('success')}}

<script type="text/javascript" language="JavaScript">
success1(' la creation faite avec succes');
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
<select class="custom-select"  name="typecompte" id="typecompte">
  <option selected>Type Compte</option>
  <option value="1">Compte Courant</option>
  <option value="2">Compte Epargne</option>
</select>
<div class="container box">
  
   <div class="form-group">
    <h4>Creation de compte</h4>

    <input type="text" name="client_info" id="client_info" class="form-control input-lg" autocomplete="off" placeholder="rechercher un client" />
   
    
   </div>

      <div class="form-group">
         <div id="clientList">
    </div>
      </div>
    </div>
  
   <form action="{{url('Store_Compte_Epargne')}}" method="post">

    <div  id="form_epargne"    >
     
   {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Solde</label>
      <input type="text" name="solde" class="form-control" >
    </div>
    <div class="form-group col-md-4">
      <label for="prenom">Prenom</label>
      <input type="text" name="prenom" class="form-control" id="prenom" placeholder="prenom">
    </div>

    <div class="form-group col-md-4">
      <label for="aux interet">Taux interet</label>
      <input type="text" class="form-control" name="taux_interet" id="inputPassword4" placeholder="Taux Interet">
    </div>
  </div>
        <input id="idcompte22" name="idcompte" type="hidden">

  <button type="submit" class="btn btn-primary">enregistrer</button>
</form>
</div>
   <form  action="{{url('Store_Compte_Courant')}}" method="post">

<div  id="form_courant"  style="position:fixed;" >

   {{ csrf_field() }}

  <div class="form-row">
     <div class="form-group col-md-4">
      <label for="inputCity">NumCompte</label>
      <input type="text" name="numcompte" class="form-control" id="inputNumCompte2" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">Solde</label>
      <input type="text" name="solde" class="form-control" id="inputCity">
    </div>
    
    <div class="form-group col-md-4">
      <label for="inputCity">Debit Max</label>
      <input type="text" name="debit_max" class="form-control" id="inputCity">
    </div>
  </div>
         <input id="idcompte33" name="idcompte" type="hidden">

    <button type="submit" class="btn btn-primary">enregistrer</button>


</div>
</form>

</div>

<div class="col-3">
     <section>
                     
    <div class="list-group">
    	<div class="p-3 mb-2 bg-light text-dark">
		<h4 >
Options</h4>
	</div>
      <a href="{{url('Comptes')}}" class="list-group-item list-group-item-action "><b>Liste des Comptes</b></a>
        <a href="{{url('Supprimer_Compte')}}" class="list-group-item list-group-item-action "><b>Supprimer Comptes</b></a>

        <a href="{{url('Create_Compte')}}" class="list-group-item bg-success list-group-item-action active"><b>Nouveau Compte</b></a>

    </div>


                    </section>

                     

                  </div>

              </div>
              <script>
$(document).ready(function(){

 $("#form_courant").hide();
    $("#form_epargne").hide();



 $('#client_info').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('Comptes.Create_Compte.fetchOfCreate')}}",
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

        $('#clientList').fadeOut();  
    }); 
        console.log( "ready!" );
 

});
 


        //this code gets the value of the select when ever it changed
        $('#typecompte').change(function(){
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

        });
  </script>
</script>

@endsection
