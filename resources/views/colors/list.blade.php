@extends('layouts.app')

@section('title')
<div class="text-center">
	<h2>List of Colors</h2>
</div>
<hr>
@endsection

@section('content')

<div class="row">
	<div class="col-md-4">

	</div>

	<div class="col-md-4">
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@elseif (session('error'))
			<div class="alert alert-warning">
				{{ session('error') }}
			</div>
		@endif

		@if ( count($color) > 0 )
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Color</th>
					@if(Auth::check())
						@if(Auth::user()->isAdmin)
							<th>Actions</th>
						@endif
					@endif
				</tr>
			</thead>

			<tbody>
				@foreach ($color as $color)
				<tr>
					<td>{{ $color->color }}</td>
					@if(Auth::check())
						<td>
							@if(Auth::user()->isAdmin)
								<a class="btn btn-default" href="/colors/{{ $color->id }}">View</a>
								<a class="btn btn-success" href="/colors/{{ $color->id }}/edit">Edit</a>
								<form  action="/colors/{{ $color->id }}" style="display:inline-table;" method="POST">
									{{csrf_field()}}
									{{ method_field('DELETE') }}
									<input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?') ">
								</form>
							@else
								<a class="btn btn-default" href="/colors/{{ $color->id }}">View</a>
							@endif
						</td>
					@else
						<td>
							<a class="btn btn-default" href="/colors/{{ $color->id }}">View</a>
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

	<div class="col-md-4">

	</div>
</div>

@endsection
