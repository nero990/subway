@extends("layouts.app")

@section("content")

    <div class="forms">
        <h2 class="title1">Update Sandwich</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Update Sandwich</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                @include('flash::message')
                {!! Form::model($sandwich, ["method" => "PUT", "route" => ["sandwiches.update", $sandwich->id]]) !!}
                @include("sandwiches.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
