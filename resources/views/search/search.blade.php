@extends('layouts.app')

@section('css')


@endsection

@section('title')
<div class="text-center">
	<h2>Search</h2>
</div>
<hr>
@endsection

@section('content')
<div id="wrap" class="color1-inher">
	<div class="search-1 m-t-sm-40">
		<div class="container">
			<div class="col-xs-12 col-md-1">

			</div>

			<div class="col-xs-12 col-md-10">
				<div class="row">
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
							</ul>
						</div>
					@endif
						<div class="row">
							<div class="bg-primary text-white col-xs-7 col-sm-6 col-md-5 text-center">
								<div class="fs-21 text-left"><span class="fa fa-search" aria-hidden="true"></span>Търсене на автомобили</div>
							</div>

							<div class="col-xs-3 col-sm-5 col-md-6">

							</div>

							<div class="bg-success text-white col-xs-2 col-sm-1 col-md-1 text-center">
								<div class="fs-21 text-center" id="carsCount">
									{{ $carsCount }}
								</div>
							</div>

						</div>
				</div>

				<form id="formSearch" name="formSearch" method="post" action="/cars/search">
				{{ csrf_field() }}

					<div class="search-option">
						<div class="row">
							<div class="row">
								<div class="col-xs-12 col-md-4">
									<div class="form-group">
										<label class="fs-12" for="brand">Марка:</label>
										<select id="brand" name="brand" class="form-control">
											<option value="">-избери-</option>
											@foreach($brand as $brand)
												<option value="{{ $brand->id }}" >{{ $brand->brand }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-xs-12 col-md-4">
									<div class="form-group">
										<label class="fs-12" for="model">Модел:</label>
										<select id="modelb" name="modelb" class="form-control">
											<option value="">-избери-</option>
											@foreach($modelb as $modelb)
												<option value="{{ $modelb->id }}" >{{ $modelb->modelb }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-xs-12 col-md-4">
									<div class="form-group">
										<p>
										  <label for="amount">Price range:</label>
										  <input type="text" id="amount" name="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
										</p>

										<div id="slider-range"></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12 col-md-4">

									<div class="form-group">
										<label class="fs-12" for="engine">Двигател:</label>
										<select id="engine" name="engine" class="form-control">
											<option value="">-избери-</option>
											@foreach($engine as $engine)
												<option value="{{ $engine->id}}">{{ $engine->engine }}</option>
											@endforeach
										</select>
									</div>

								</div>

								<div class="col-xs-12 col-md-4">
									<div class="form-group">
										<label class="fs-12" for="color">Цвят:</label>
										<select id="color" name="color" class="form-control">
											<option value="">-избери-</option>
											@foreach($color as $color)
												<option value="{{ $color->id}}">{{ $color->color }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-xs-12 col-md-4">
									<div class="form-group" style="padding-top: 24px;">
										<button type="submit" class="btn btn-default" id="btn" style="display: inline-block; width: 100%">Стартирай търсене</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>

		</div>

		<div class="col-xm-12 col-md-1">

		</div>

	</div>
</div>

@endsection

@section('javascript')
<script>
$( function() {
	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 200000,
		step: 1000,
		values: [ 15000, 60000 ],
		slide: function( event, ui ) {
			$( "#amount" ).val( "BGN" + ui.values[ 0 ] + " - BGN" + ui.values[ 1 ] );
		}
	});
	$( "#amount" ).val( "BGN" + $( "#slider-range" ).slider( "values", 0 ) +
		" - BGN" + $( "#slider-range" ).slider( "values", 1 ) );

	var min_price=$( "#slider-range" ).slider( "values", 0 );
	var max_price=$( "#slider-range" ).slider( "values", 1 );
});
</script>
@endsection
