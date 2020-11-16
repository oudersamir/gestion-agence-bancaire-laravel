@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			<form action="{{ url('cvs') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group  @if($errors->get('titre')) has-error @endif">
				<label>Titre</label><input type="text" name="titre" class="form-control" value="{{old('titre')}}"></input>
					@if($errors->get('titre'))
					<div class="alert alert-danger" role="alert">
					@foreach($errors->get('titre') as $message)
					<li>{{$message}}</li>
					@endforeach
					 </div>
					@endif
                
				</div>
				<div class="form-group  @if($errors->get('titre')) has-error @endif">
				<label>Presentation</label>
				<textarea name="presentation" class="form-control" >{{old('presentation')}}</textarea>
				
					@if($errors->get('presentation'))
					<div class="alert alert-danger" role="alert">
					@foreach($errors->get('presentation') as $message)
					<li>{{$message}}</li>
					@endforeach
					 </div>
					@endif
                
				</div>
				<div class="form-group">
				<input type="submit"   value="enregistrer" class="form-control btn btn-primary"></input>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection