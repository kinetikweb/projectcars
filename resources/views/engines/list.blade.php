@extends('layouts.app')

@section('title')
<div class="text-center">
	<h2>List of Engines</h2>
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

		@if ( count($engine) > 0 )
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Engine Names</th>
						@if(Auth::check())
							@if(Auth::user()->isAdmin)
								<th>Actions</th>
							@endif
						@endif
					</tr>
				</thead>

				<tbody>
					@foreach ($engine as $engine)
						<tr>
							<td>{{ $engine->engine }}</td>
							@if(Auth::check())
								<td>
									@if(Auth::user()->isAdmin)
										<a class="btn btn-default" href="/engines/{{ $engine->id }}">View</a>
										<a class="btn btn-success" href="/engines/{{ $engine->id }}/edit">Edit</a>
										<form  action="/engines/{{ $engine->id }}" style="display:inline-table;" method="POST">
											{{csrf_field()}}
											{{ method_field('DELETE') }}
											<input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?') ">
										</form>
									@else
										<a class="btn btn-default" href="/engines/{{ $engine->id }}">View</a>
									@endif
								</td>
							@else
								<td>
									<a class="btn btn-default" href="/engines/{{ $engine->id }}">View</a>
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
