 @extends('layouts.master')

@section('content')
<div class="form-row">
<div     class="col-9">
@if(session()->has('success'))
          <div class="alert alert-success" role="alert">
   {{session()->get('success')}}

<script type="text/javascript" language="JavaScript">
success1('le Virement fait avec succes');
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
      <h2> Virement de Compte Courant</h2>
   <form   action="{{url('Virement_Compte_Courant')}}" method="post">
      <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Client</label>
  </div>
<select name="client_id_client"   id="client_id_client"  class="form-control input-lg dynamic" data-dependent="id_comptes">
    <option selected>Sélectionner le compte client</option>
    @foreach($client_list as $client)
    <option value="{{ $client->id_client}}">{{ $client->nom }}  {{ $client->prenom }}</option>
     @endforeach
  </select>
</div>
   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Compte</label>
  </div>
  <select name="id_comptes"   id="id_comptes"    class="form-control input-lg">
    
  </select>
</div>
   {{ csrf_field() }}

  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Bénificiaire</label>
  </div>
  <select name="client_id_client1"   id="client_id_client1"  class="form-control input-lg dynamic1" data-dependent="id_comptes1" > 
       <option selected>Sélectionner le compte client</option>
    @foreach($client_list as $client)
     <option value="{{ $client->id_client}}">{{ $client->nom }}  {{ $client->prenom }}</option>
     @endforeach
  </select>
</div>
   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Compte </label>
  </div>
  <select name="id_comptes1"   id="id_comptes1"    class="form-control input-lg">
  
  </select>
</div>
<div class="form-group">
    <label for="inputAddress">Montant</label>
    <input type="text" class="form-control" name="montant" placeholder="Montant" autocomplete="off" >
  </div>
<input type="hidden"  name="type_virement" id="type_virement">
  <div class="form-group">
    <input type="submit" class="btn btn-success" id="idclick" name="virser" value="Virement">
  </div>
</div>
</form>
<div  class="col-3">
 <section>
<div class="list-group">
	<div class="p-3 mb-2 bg-light text-dark">


		<h4 >
Options</h4>
	</div>
  <a href="{{url('Effectuer_Virement')}}" class="list-group-item bg-success list-group-item-action active"><b>Effectuer un Virement</b></a>
  <a href="{{url('Effectuer_Retrait')}}" class="list-group-item list-group-item-action"><b>Effectuer un Retrait</b></a>
  <a href="{{url('Effectuer_Viresement')}}" class="list-group-item list-group-item-action"><b>Effectuer un Versement</b></a>

</div>
                </section>
              </div>
          </div>
          <script type="text/javascript">
          $(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {var client= 'c';
  var meme='false';
   var value2=$( "#id_comptes option:selected" ).val();

   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('OperationController.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent,value2:value2,client:client,meme:meme},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#client_id_client').change(function(){
  $('#id_comptes').val('');
     $('#id_comptes1').empty();
     //  $('#client_id_client1').empty();



 });

$('#id_comptes').change(function(){
   $('#id_comptes1').empty();


  
 });


 $('.dynamic1').change(function(){




  if($(this).val() != '')
  {
    var client= 'b';
   var select = $(this).attr("id");
   var meme='false';


   var c1 = $('#client_id_client').val();
   var c2 = $('#client_id_client1').val();
  if(c1==c2) meme='true';

   var value = $(this).val();


   var value2=$( "#id_comptes option:selected" ).val();
  
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('OperationController.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent,value2:value2,client:client,meme:meme},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })

  }


 });



  $('#client_id_client1').change(function(){
  $('#id_comptes1').val('');


 });

$('#idclick').click(function(){
var str1= $('#id_comptes1').find("option:selected").text();
  if(str1.indexOf("compte epargne") != -1){
//alert(str1+"  rah kayn ");
$('#type_virement').val('courant_epargne');
} else {
//alert("  rah  makaynch ");
$('#type_virement').val('courant_courant');

}
 });



 

});
</script>
@endsection
