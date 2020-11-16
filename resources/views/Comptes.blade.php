@extends('layouts.master')

@section('content')
<div class="form-row">
<div     class="col-9">



<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h1>la liste  des Comptes</h1>

      @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
   {{session()->get('success')}}

<script type="text/javascript" language="JavaScript">
success1(' l operationa a ete  faite avec succes');
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
      
   
   
       
      <table id="datatable1" class="table">
    <thead class="thead-dark">
      <tr> 
        <th data-sort="string">Nom et Prenom</th>
                <th data-sort="string">Telephone</th>
                <th data-sort="string">Cin</th>
                <th data-sort="string">Date D'ouverture</th>
                 <th data-sort="string">Numero Compte</th>
                 <th data-sort="string">Solde</th>
                <th data-sort="string">operation</th>
                  <th data-sort="string">compte epargne</th>
            

      </tr>
    </thead> 
      @foreach($listcompte as $ct)
    @if(@isset($ct->compte_courant->solde))
<input type="hidden" id="hiddenSolde" value="{{$ct->compte_courant->solde}}" />
            <tr      onclick="javascript:showRow(this);">
             <td ><h4> <b>{{$ct->client->nom}} {{$ct->client->prenom}}</b></h4></td>
             <td> <h4><b>{{$ct->client->tel}}</b></h4></td>

                <td><h4> <b>{{$ct->client->cin}}</b></h4></td>
                <td><h4><b> {{$ct->date_ouverture}}</b></h4></td>
                           
                  <td>
                    <h4><b>{{$ct->num_comptes}}</b>
                  
                  </b>
                    </td>
  <td>
    @if(@isset($ct->compte_courant->solde))
<h4><b>{{$ct->compte_courant->solde}} </b></h4>
@endif
  </td>
                <td>
                   
        <div class="header-widget">
<a href="#sign-in-dialog1" id="releve" class="sign-in popup-with-zoom-anim  btn btn-warning"><h6> Relevé de Compte</h6></a>        </div>
                    </div>
  
                </td> 
                 <td>
<div class="list-group">
                  
                   @foreach($ct->compte_epargne as $compte)  
 <a href="#sign-in-dialog2" id="releveEpargne" class="sign-in popup-with-zoom-anim  list-group-item ">  <b>{{$compte->prenom}} </b>  {{$compte->solde}} DH</a>    

                  @endforeach  
              </ul>
 

                    </td>
            </tr>
            @endif
            @endforeach
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
  <a href="{{url('Comptes')}}" class="list-group-item bg-success list-group-item-action active"><b>Liste des Comptes</b></a>
  <a href="{{url('Supprimer_Compte')}}" class="list-group-item list-group-item-action "><b>Supprimer Comptes</b></a>
    <a href="{{url('Create_Compte')}}" class="list-group-item list-group-item-action "><b>Ajouter Compte </b></a>


</div>
                </section>
                  
              </div>
          </div>
 


        <table id="sign-in-dialogo" class="table text-danger  zoom-anim-dialog mfp-hide">

    <thead class="thead-dark">
      <tr> 
                <th >Nom et Prenom</th>
                <th>Telephone</th>
                <th>Cin</th>
                <th>Date D'ouverture</th>
                 <th>Numero Compte</th>
                 <th>Solde</th>
                <th>operation</th>
                              <th>compte epargne</th>

      </tr>
    </thead> 
      @foreach($listcompte as $ct)
    @if(@isset($ct->compte_courant->solde))
<input type="hidden" id="hiddenSolde" value="{{$ct->compte_courant->solde}}" />
            <tr">
             <td> {{$ct->client->nom}} {{$ct->client->prenom}}</td>
             <td> {{$ct->client->tel}}</td>

                <td> {{$ct->client->cin}}</td>
                <td> {{$ct->date_ouverture}}</td>
                           
                  <td>
                    {{$ct->num_comptes}}<br/>
                  
                  
                    </td>
  <td>
    @if(@isset($ct->compte_courant->solde))
{{$ct->compte_courant->solde}} 
@endif
  </td>
                <td>
                   
        <div class="header-widget">
<a href="#sign-in-dialog" id="releve"  class="sign-in popup-with-zoom-anim  btn btn-warning" > Relevé</a>        </div>
                    </div>
  
                </td> 
                 <td>

                  <select name="CompteEpargne">
                   @foreach($ct->compte_epargne as $compte)  
                    <option  >{{$compte->prenom}}   {{$compte->solde}}  </option> 

                  @endforeach  
                  </select>
                    </td>
            </tr>
            @endif
            @endforeach
 <tr><td colspan="3"> 

  <input type="date" name="date_debut"></td><td colspan="3"><input type="date" name="date_start"></td>
  <td><input type="submit" name="rechercher" value="rechercher"></td></tr>

      </table>

  <div id="sign-in-dialog1" class="table text-danger  zoom-anim-dialog mfp-hide">
  <input type="text" id="num_comptes1" readonly />

<input type="date"  id="releve_fetch_date_debut" name="date_debut">
<input type="date"  id="releve_fetch_date_fin" name="date_fin">

 <table class="table"  id="record_releve_compte_courant">
  
      </table>
    </div>


    <div id="sign-in-dialog2" class="table text-danger  zoom-anim-dialog mfp-hide">
  <input type="text" id="num_comptes2" readonly />

<input type="date"  id="releve_fetch_date_debut2" name="date_debut">
<input type="date"  id="releve_fetch_date_fin2" name="date_fin">

 <table class="table"  id="record_releve_compte_epargne">
  
      </table>
    </div>


      <!-- Sign In Popup / End -->
<input type="hidden" id="hidden_num_comptes" >
<input type="hidden" id="hidden_num_compte_epargne" >

<script>


  function showRow(row)
{
  var x=row.cells;
 $("#record_releve_compte_courant").empty();
$('#releve_fetch_date_debut').empty();
$('#releve_fetch_date_fin').empty();
 $("#record_releve_compte_epargne").empty();
$('#releve_fetch_date_debut2').empty();
$('#releve_fetch_date_fin2').empty();
var  str=x[4].innerHTML.trim();
var  str2=x[5].innerHTML.trim();


var  nom_prenom=x[0].innerHTML.trim();

  var nom_prenom =nom_prenom.substring(8, nom_prenom.length-9);

  var str1 =str.substring(7, str.length-68);
    var str22 =str2.substring(7, str2.length-10);

/*alert(str.length);
alert(str2.length);
*/

  document.getElementById("hidden_num_comptes").value = str1;
 document.getElementById("num_comptes1").value ='Releve de '+'compte courant :  '+nom_prenom+'   '+str1+ '          solde : '+str22+ ' ';
}


$(document).ready(function(){


$(document).on('click','#releveEpargne',function(){
  var strArray =$(this).text().split("   ");
//alert(strArray[0]);

  document.getElementById("hidden_num_compte_epargne").value = strArray[0];
 document.getElementById("num_comptes2").value ='Releve de Compte  :    '+ (document.getElementById("hidden_num_comptes").value).trim() +'     Compte epargne  :   '+strArray[0]+ '                solde :   '+strArray[1];

});


/*table.on('click','#releve',function(){


  
$tr=$(this).closest('tr');
if($($tr).hasClass('child')){
  $tr=$tr.prev('.parent');

}
var data = table.row($tr).data();
$('#nomprenom').val(data[0]+" "+data[0]);
$('#solde').val(data[5]);


});*/





 function fetch_releve_compte_courant(date_debut = '',date_fin = '',num_comptes = '')
 {


  $.ajax({
   url:"{{ route('client_search.Releve_Compte_Courant') }}",
   method:'GET',
   data:{date_fin:date_fin,date_debut:date_debut,num_comptes:num_comptes},
   dataType:'json',
   success:function(data)
   {
    $('#record_releve_compte_courant').html(data.table_data);
   }
  })

 }
 function fetch_releve_compte_epargne(date_debut = '',date_fin = '',num_comptes = '',num_compte_epargne)
 {


  $.ajax({
   url:"{{ route('client_search.Releve_Compte_Epargne') }}",
   method:'GET',
   data:{date_fin:date_fin,date_debut:date_debut,num_comptes:num_comptes,num_compte_epargne:num_compte_epargne},
   dataType:'json',
   success:function(data)
   {
    $('#record_releve_compte_epargne').html(data.table_data);
   }
  })

 }

  $(document).on('change', '#releve_fetch_date_fin2', function(){
  var date_fin = $(this).val();
  var num_comptes=$('#hidden_num_comptes').val();
  var num_compte_epargne=$('#hidden_num_compte_epargne').val();
  var date_debut =$('#releve_fetch_date_debut2').val();
fetch_releve_compte_epargne(date_debut,date_fin,num_comptes,num_compte_epargne);

 });

  $(document).on('change', '#releve_fetch_date_fin', function(){
  var date_fin = $(this).val();
  var num_comptes=$('#hidden_num_comptes').val();
  var date_debut =$('#releve_fetch_date_debut').val();
fetch_releve_compte_courant(date_debut,date_fin,num_comptes);

     $("#record_releve_compte_courant").stupidtable();

 });

 

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

    fetch_customer_data3(query);

 });


});

   

    // alert("hhh");
$("#datatable1").stupidtable();

//$('#datatable1').DataTable() ;

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
         message: 'je suis samir',
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