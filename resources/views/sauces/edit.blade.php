@extends("layouts.app")
@section("sauces_active") active @endsection

@section("content")

    <div class="forms">
        <h2 class="title1">Update Sauce</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Update Sauce</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                @include('flash::message')
                {!! Form::model($sauce, ["method" => "PUT", "route" => ["sauces.update", $sauce->id]]) !!}
                @include("sauces.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
