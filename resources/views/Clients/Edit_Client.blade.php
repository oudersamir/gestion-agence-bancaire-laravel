@extends('layouts.master')

@section('content')

<div class="form-row">
<div     class="col-9">
  <h1>Modifier Client</h1>

	<form action="{{url('Edit_Client/'.$client->id_client)}}"  method="post">
		    <input type="hidden" name="_method" value="PUT">

	{{csrf_field()}}
	 <div class="form-row">
		
    <div class="form-group col-md-4">
      <label for="inputCity">Nom</label>
      <input type="text" name="nom" value="{{$client->nom}}" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Prenom</label>
     <input type="text" name="prenom"  value="{{$client->prenom}}" class="form-control">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Cin</label>
      <input type="text" name="cin"  value="{{$client->cin}}" class="form-control" id="inputZip">
    </div>
  </div>	
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" value="{{$client->email}}"  id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Telephone</label>
      <input type="text" class="form-control" name="telephone"  value="{{$client->tel}}" id="inputPassword4" placeholder="+212 0# ## ## ## ##">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="adresse" value="{{$client->adresse}}"  id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" name="adresse2" value=""  placeholder="Apartment, studio, or floor">
  </div>
 
  <button type="submit" name="modifier" class="btn btn-success">Modifier</button>
</form>
</div>

<div class="col-3">
     <section>
                      
    <div class="list-group">
    	<div class="p-3 mb-2 bg-light text-dark">
		<h4 >
Options</h4>
	</div>
<a href="{{url('Clients')}}" class="list-group-item list-group-item-action {{ Request::path() == 'Clients' ? 'active' : '' }}">Liste des Clients</a>
<a href="{{url('Edit_Client')}}" class="list-group-item bg-success list-group-item-action active">Modifier Client</a>

<a href="{{url('Create_Client')}}" class="list-group-item list-group-item-action  {{ Request::path() == 'Create_Client' ? 'active' : '' }}">Nouveau Client</a>

    </div>
                    </section>
                  </div>
              </div>
@endsection
