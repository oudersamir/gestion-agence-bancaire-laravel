@extends('layouts.master')

@section('content')

<div class="form-row">
<div     class="col-9">



	<form action="{{url('Store_Client')}}"  method="post">
	{{csrf_field()}}
	 <div class="form-row">
		
    <div class="form-group col-md-4  @if($errors->get('nom')) has-error @endif"  >
      <label for="inputCity">Nom</label>
      <input type="text" name="nom" value="{{old('nom')}}" class="form-control" id="inputCity">
      @if($errors->get('nom'))
      <ul>@foreach ($errors->get('nom') as $message)
      <p class="text-danger">{{$message}}</p>
      @endforeach
      </ul>
      @endif
    </div>
    <div class="form-group col-md-4   @if($errors->get('prenom')) has-error @endif">
      <label for="inputState">Prenom</label>
     <input type="text" name="prenom"  value="{{old('prenom')}}" class="form-control">
       @if($errors->get('prenom'))
      <ul>@foreach ($errors->get('prenom') as $message)
      <p class="text-danger">{{$message}}</p>
      @endforeach
      </ul>
      @endif
    </div>
    <div class="form-group col-md-4   @if($errors->get('cin')) has-error @endif">
      <label for="inputZip">Cin</label>
      <input type="text" name="cin"  value="{{old('cin')}}" class="form-control" id="inputZip">
        @if($errors->get('cin'))
      <ul>@foreach ($errors->get('cin') as $message)
      <p class="text-danger">{{$message}}</p>
      @endforeach
      </ul>
      @endif
    </div>
  </div>	
  <div class="form-row">
    <div class="form-group col-md-6    @if($errors->get('email')) has-error @endif">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" value="{{old('email')}}"  id="inputEmail4" placeholder="Email">
        @if($errors->get('email'))
      <ul>@foreach ($errors->get('email') as $message)
      <p class="text-danger">{{$message}}</p>
      @endforeach
      </ul>
      @endif
    </div>
    <div class="form-group col-md-6    @if($errors->get('telephone')) has-error @endif">
      <label for="inputPassword4">Telephone</label>
      <input type="text" class="form-control" name="telephone"  value="{{old('telephone')}}" id="inputPassword4" placeholder="+212 0# ## ## ## ##">
        @if($errors->get('telephone'))
      <ul>@foreach ($errors->get('telephone') as $message)
      <p class="text-danger">{{$message}}</p>
      @endforeach
      </ul>
      @endif
    </div>
  </div>
  <div class="form-group    @if($errors->get('adresse')) has-error @endif">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="adresse" value="{{old('adresse')}}"  id="inputAddress" placeholder="1234 Main St">
      @if($errors->get('adresse'))
      <ul>@foreach ($errors->get('adresse') as $message)
      <p class="text-danger">{{$message}}</p>
      @endforeach
      </ul>
      @endif
  </div>
  <div class="form-group    @if($errors->get('adresse2')) has-error @endif">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" name="adresse2" value="{{old('adresse2')}}"  placeholder="Apartment, studio, or floor">
   
  </div>
 
  <button type="submit" name="enregistrer" class="btn btn-success">Enregistrer</button>
</form>
</div>

<div class="col-3">
     <section>
                    
    <div class="list-group">
    	<div class="p-3 mb-2 bg-light text-dark">
		<h4 >
Options</h4>
	</div>
<a href="{{url('Clients')}}" class="list-group-item list-group-item-action {{ Request::path() == 'Clients' ? 'active   bg-success' : '' }}">Liste des Clients</a>
<a href="{{url('Create_Client')}}" class="list-group-item list-group-item-action  {{ Request::path() == 'Create_Client' ? 'active  bg-success' : '' }}">Nouveau Client</a>

    </div>
                    </section>
                  </div>
              </div>
@endsection
 	