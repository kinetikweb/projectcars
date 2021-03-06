@extends('layouts.app')

@section('title')
<div class="text-center">
    <h2>Create new Car</h2>
</div>
<hr>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('layouts.parts.errors')

                <form class="form-horizontal" action="/cars" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include('cars._form')

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
