@extends('layouts.master')

@section('content')
<div class="form-row">
<div     class="col-9">


</div>
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
@endsection
