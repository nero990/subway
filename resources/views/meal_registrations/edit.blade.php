@extends("layouts.app")
@section("meal_registrations_active") active @endsection

@section("content")

    <div class="forms">
        <h2 class="title1">Update Meal Order [{{$mealRegistration->meal->name}}]</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Update Meal Order [{{$mealRegistration->meal->name}}]</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                @include('flash::message')
                {!! Form::model($mealRegistration, ["method" => "PUT", "route" => ["meal-registrations.update", $mealRegistration->id]]) !!}
                @include("meal_registrations.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
