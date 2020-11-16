@extends('layouts.master')

@section('content')


<div class="form-row" id="root">
<div     class="col-9">
   @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
   {{session()->get('success')}}

<script type="text/javascript" language="JavaScript">
success1(' l operation a ete  fait avec succes');
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
 <div class="form-row">
<h1></h1>

      <input type="text" name="search" id="search" class="form-control" placeholder="Information sur Compte " />
           @{{message}}

       </div>


      </table>
             <div class="form-row">

              <div class="col">
 @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
   {{session()->get('success')}}
      </div>
      @endif

      <div id="records1">
  
      </div>
      
    </div>
</div>
       <div class="form-row">


      <table class="table"  id="records2">
  
      </table>
      
    </div>
       <div class="form-row" id="records3">


 
   
    </div>
  </div>


<div  class="col-3">
 <section>
              
<div class="list-group">
	<div class="p-3 mb-2 bg-light text-dark">
		<h4 >
Options</h4>
	</div>
  <a href="{{url('Comptes')}}" class="list-group-item list-group-item-action "><b>Liste des Comptes</b></a>
  <a href="{{url('Comptes')}}" class="list-group-item bg-success list-group-item-action active"><b>Supprimer Comptes</b></a>
    <a href="{{url('Create_Compte')}}" class="list-group-item list-group-item-action "><b>Ajouter Compte </b></a>


</div>
                </section>
                  
              </div>
          </div>

<script>
$(document).ready(function(){

 //fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('client_search.action2') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#records1').html(data.table_data);
   }
  })
 }
 //fetch_customer_data2();

 function fetch_customer_data2(query = '')
 {
  $.ajax({
   url:"{{ route('client_search.action3') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#records2').html(data.table_data);
   }
  })
 }

  fetch_customer_data3();

  function fetch_customer_data3(query = '')
 {
  $.ajax({
   url:"{{ route('client_search.action4') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
       
        $('#records3').html(data.table_data);

   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
    /*fetch_customer_data(query);
    fetch_customer_data2(query);*/
    fetch_customer_data3(query);

 });
});
</script>
@endsection




@section('javascripts')

<script src="js/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script >
  
window.Laravel={!! json_encode([

'csrfToken' => csrf_token(),
'ur' => url('/')


  ]) !!}
</script>
<script>
  
  var app = new Vue({
       el: '#root',
       data: {
         message: ' ',
         open:false,
         CompteEpargne: {
          compte_id_comptes: 0,
         id_compte_epargne: 0,

         solde: 0,
         prenom:  ''
         }
       },
    methods: {
addCompteEpargne: function(){
          axios.post(window.Laravel.url+'/addCompteEpargne',this.CompteEpargne)
          .then(response =>{
            console.log(response.date)
          })
          .catch(error  => {
            console.log(error)

          })
        }
}
       
      
  });

</script>

@endsection