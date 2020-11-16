@extends('layouts.master')

@section('content')





@if(count($errors))
<div class="alert alert-danger" role="alert">

@foreach($errors->all() as $message)
<ul>
	<li>{{$message}}</li>
</ul>
@endforeach
</div>

@endif

<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			<form action="{{ url('cvs/'.$cv->id) }}" method="post">
				 <input type="hidden" name="_method" value="PUT">

				{{ csrf_field() }}
				<div class="form-group">
				<label>Titre</label><input type="text" name="titre" class="form-control" value="{{$cv->titre}}"></input>
				
				</div>
				<div class="form-group">
				<label>Presentation</label>
				<textarea name="presentation" class="form-control" >{{$cv->presentation}}</textarea>
			
				</div>
				
				<div class="form-group">
				<input type="submit"   value="Modifier" class="form-control btn btn-danger"></input>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection