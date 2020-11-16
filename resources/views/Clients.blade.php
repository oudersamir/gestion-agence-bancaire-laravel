 @extends('layouts.master')

@section('content')

<div class="form-row  ">
<div     class="col-9">



<div class="container ">
  <div class="row">
    <div class="col-md-12">
  @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
   {{session()->get('success')}}

<script type="text/javascript" language="JavaScript">
success1(' l operation a ete faite avec succes');
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
      <h1>la liste  des Clients</h1>
            <input type="text" name="search" id="search" class="form-control" placeholder="Client" />

     
   
   
       
      <table class="table ">
    <head>
      <tr> 
                <th><h4><b>Nom</b></h4></th>
                <th><h4><b>Prenom</b></h4></th>
                <th><h4><b>Telephone</b></h4></th>
                <th><h4><b>Cin</b></h4></th>
                <th><h4><b>Adresse</b></h4></th>
                <th><h4><b>Email</b></h4></th>
                <th><h4><b>Numero compte</b></h4></th>
                <th><h4><b>Action</b></h4></th>
      </tr>
    </head> 
      <tbody id="records">

        
        </tbody>
      </table>
    </div>
  </div>

</div>


    </div>

    <div  class="col-3">
     <section>
                      
    <div class="list-group">
<div class="p-3 mb-2 bg-light text-dark">
    <h4 >
Options</h4>
  </div>
      <a href="{{url('Clients')}}" class="list-group-item bg-success list-group-item-action active"><b>Liste des Clients</b></a>
        <a href="{{url('Create_Client')}}" class="list-group-item list-group-item-action "><b>Nouveau Client</b></a>

    </div>
                    </section>
                  </div>
              </div>
              <script >
                

 $(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('client_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#records').html(data.table_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
    fetch_customer_data(query);


 });
});
              </script>
@endsection
