@extends("layouts.app")
@section("title") Meal Registration @endsection
@section("meal_registrations_active") active @endsection

@section("content")
    <div class="forms">
        <h2 class="title1">Meal Registration</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Meal Registration</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                {!! Form::open(["method" => "POST", "route" => "meal-registrations.store"]) !!}
                @include("meal_registrations.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
