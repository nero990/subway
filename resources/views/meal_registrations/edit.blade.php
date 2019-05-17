@extends("layouts.app")
@section("meals_active") active @endsection

@section("content")

    <div class="forms">
        <h2 class="title1">Update Meal</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Update Meal</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                @include('flash::message')
                {!! Form::model($meal, ["method" => "PUT", "route" => ["meals.update", $meal->id]]) !!}
                @include("meals.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
