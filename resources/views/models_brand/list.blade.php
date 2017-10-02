@extends('layouts.app')

@section('title')
<div class="text-center">
	<h2>List of Models</h2>
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

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif


		<div class="form-inline">
			<form method="GET">
				<select id="search" name="search" class="form-control">
					<option value=""></option>
	                @foreach($brand as $brand)
						<option value="{{ $brand->brand}}">{{ $brand->brand }}</option>
					@endforeach
				</select>
				<input type="submit" value="Search">
			</form>
		</div>
		@if ( count($modelb) > 0 )
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Brand</th>
						<th>Model</th>
						@if(Auth::check())
							@if(Auth::user()->isAdmin)
								<th>Actions</th>
							@endif
						@endif
					</tr>
				</thead>

				<tbody>
					@foreach ($modelb as $modelb)
						<tr>
							<td>{{ $modelb->brand }}</td>
							<td>{{ $modelb->modelb}}</td>
							@if(Auth::check())
								<td>
									@if(Auth::user()->isAdmin)
										<a class="btn btn-default" href="/models/{{ $modelb->id }}">View</a>
										<a class="btn btn-success" href="/models/{{ $modelb->id }}/edit">Edit</a>
										<form  action="/models/{{ $modelb->id }}" style="display:inline-table;" method="POST">
											{{csrf_field()}}
											{{ method_field('DELETE') }}
											<input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?') ">
										</form>
									@else
										<a class="btn btn-default" href="/models/{{ $modelb->id }}">View</a>
									@endif
								</td>
							@else
								<td>
									<a class="btn btn-default" href="/models/{{ $modelb->id }}">View</a>
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
