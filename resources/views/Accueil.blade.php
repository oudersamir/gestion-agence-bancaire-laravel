@extends('layouts.master')

@section('content')
  <div class="main-search-container"    style="background-image: url('assets/htm/images/coins.jpg')">
 	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>AgenceBank</h2>
					<h4>Binevennue sur votre plateforme</h4>

					<div class="main-search-input">

						<div class="main-search-input-item">
							<input type="text" placeholder="" value=""/>
						</div>

						<div class="main-search-input-item location">
							<input type="text" placeholder="Location" value=""/>
							<a href="#"><i class="fa fa-dot-circle-o"></i></a>
						</div>

						<div class="main-search-input-item">
							<select data-placeholder="All Categories" class="chosen-select" >
								<option> Services</option>	
								<option>Clients</option>
								<option>Comptes</option>

							</select>
						</div>

						<button class="button" onclick="window.location.href='listings-half-screen-map-list.html'">recherche</button>

					</div>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection
