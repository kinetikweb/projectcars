@extends('layouts.app')

@section('title')
<div class="text-center">
	<h2>Single Car view</h2>
</div>
<hr>
@endsection

@section('content')

<div class="row">
	<div class="col-md-3">

	</div>

	<div class="col-md-6 text-center">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Image</th>
					<th>Car Info</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>
						<img class="rounded-circle" src="{{ url('images', $car->photo) }}" alt="Generic placeholder image" width="400" height="200">
					</td>
					<td class="text-left">
						<div style="color:blue;">
							<b>{{ $car->brand->brand }}<b>
						</div>
						<div style="color:blue;">
							<b>{{ $car->modelb->modelb }}</b>
						</div>
						<div style="color:blue;">
							<b>{{ $car->engine->engine }}</b>
						</div>
						<div style="color:blue;">
							<b>{{ $car->color->color }}</b>
						</div>
						<div style="color:green;">
							<b>{{ $car->price }},00 BGN</b>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="col-md-3">

	</div>
</div>

@endsection
