@extends("layouts.app")

@section("content")
    <div class="forms">
        <h2 class="title1">Update Vegetable</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Update Vegetable</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                @include('flash::message')
                {!! Form::model($vegetable, ["method" => "PUT", "route" => ["vegetables.update", $vegetable->id]]) !!}
                @include("vegetables.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
