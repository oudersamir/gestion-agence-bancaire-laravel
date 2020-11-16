 @extends('layouts.master')

@section('content')
<div class="form-row">

<div     class="col-9">
         <div class="form-group">
@if(session()->has('success'))
          <div class="alert alert-success" role="alert">
   {{session()->get('success')}}

<script type="text/javascript" language="JavaScript">
success1('le Viresement faite avec succes ');
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
      <h4>Versement de Compte Epargne</h4>
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
  
   <form action="{{url('Viresement_Compte_Epargne')}}" method="post">

    <div  id="form_epargne"    >
     
   {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Solde</label>
      <input type="text" name="solde"  id="solde1" class="form-control" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="prenom">Prenom</label>
      <input type="text" name="prenom" class="form-control" id="prenom1" placeholder="prenom" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="aux interet">Montant</label>
      <input type="text" class="form-control" name="montant" id="inputPassword4" placeholder="montant" >
    </div>
  </div>
        <input id="idcompteepargne33" name="idcompteepargne33" type="hidden">

  <button type="submit" class="btn btn-primary">enregistrer</button>
</form>
</div>
  

</div>
<div  class="col-3">
 <section>
<div class="list-group">
	<div class="p-3 mb-2 bg-light text-dark">
		<h4 >
Options</h4>
	</div>
 <a href="{{url('Effectuer_Virement_epargne')}}" class="list-group-item list-group-item-action "><b>Effectuer un Virement</b></a>
  <a href="{{url('Effectuer_Retrait_Epargne')}}" class="list-group-item  list-group-item-action "><b>Effectuer un Retrait</b></a>
  <a href="{{url('Effectuer_Viresement_Epargne')}}" class="list-group-item bg-success list-group-item-action active"><b>Effectuer un Versement</b></a>

</div>
                </section>
              </div>
          </div>
                       <script>
$(document).ready(function(){

 /*$("#form_courant").hide();
    $("#form_epargne").hide();
*/


 $('#client_info').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('Comptes.Create_Compte.fetch_epargne')}}",
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
        var text=array[0].trim();
var array2 = text.split(" ");

var i=$(this).attr('id');

var pos = i.split("_");

                $('#idcompte22').val($('#idcompte_'+pos[1]).val()); 
               $('#idcompte33').val($('#idcompte_'+pos[1]).val());  
              
               $('#numcomptes1').val($('#numcomptes_'+pos[1]).val()); 
               $('#nom1').val($('#nom_'+pos[1]).val());  
               $('#prenom1').val(array2[2]);  
               $('#solde1').val($('#solde_'+pos[1]).val());  

               $('#idcompteepargne33').val($('#idcompteepargne_'+pos[1]).val()); 

alert($(this).attr('id'));
alert( $('#idcompteepargne33').val());



/*alert($('#idcompteepargne11  option:selected').val());

alert($('#idcompteepargne33').val());


alert(array2[1]+'     '+array2[2]);*/
        $('#clientList').fadeOut();  
    }); 
        console.log( "ready!" );
 

});
 


     
  </script>
@endsection
