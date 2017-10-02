@extends('layouts.app')

@section('title')
<div class="text-center">
	<h2>List of Cars</h2>
</div>
<hr>
@endsection

@section('content')

<div class="row">
	<div class="col-md-2">

	</div>

	<div class="col-md-8">
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@elseif (session('error'))
			<div class="alert alert-warning">
				{{ session('error') }}
			</div>
		@endif

		@if ( count($car) > 0 )
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Image</th>
						<th></th>
						<th>Car Info</th>
						@if(Auth::check())
							@if(Auth::user()->isAdmin)
								<th>Actions</th>
							@endif
						@endif
					</tr>
				</thead>

				<tbody>
					@foreach ($car as $car)
						<tr>
							<td>
								<img class="rounded-circle" src="{{ url('images',$car->photo) }}" alt="Generic placeholder image" width="200" height="100">
							</td>
							<td>
								<b>brand<b><br>
								<b>model</b><br>
								<b>engine</b><br>
								<b>color</b><br>
								<b>price</b>
							</td>
							<td>
								<div style="color:blue;">
									<b>{{ $car->brand }}<b>
								</div>
								<div style="color:blue;">
									<b>{{ $car->modelb }}</b>
								</div>
								<div style="color:blue;">
									<b>{{ $car->engine }}</b>
								</div>
								<div style="color:blue;">
									<b>{{ $car->color }}</b>
								</div>
								<div style="color:green;">
									<b>{{ $car->price }},00 BGN</b>
								</div>
							</td>

							@if(Auth::check())
								<td>
									@if(Auth::user()->isAdmin)
										<a class="btn btn-default" href="/cars/{{ $car->id }}">View</a>
										<a class="btn btn-success" href="/cars/{{ $car->id }}/edit">Edit</a>
										<form  action="/cars/{{ $car->id }}" style="display:inline-table;" method="POST">
											{{csrf_field()}}
											{{ method_field('DELETE') }}
											<input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?') ">
										</form>
									@else
										<a class="btn btn-default" href="/cars/{{ $car->id }}">View</a>
									@endif
								</td>
							@else
								<td>
									<a class="btn btn-default" href="/cars/{{ $car->id }}">View</a>
								</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>No records</p>
		@endif
	</div>

	<div class="col-md-2">

	</div>
</div>

@endsection
