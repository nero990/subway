@extends("layouts.app")
@section("meals_active") active @endsection
@section("meals_new_active") class="active" @endsection

@section("content")
    <div class="forms">
        <h2 class="title1">New Meal</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>New Meal</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                {!! Form::open(["method" => "POST", "route" => "meals.store"]) !!}
                @include("meals.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
