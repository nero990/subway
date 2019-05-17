@extends("layouts.app")

@section("content")
    <div class="forms">
        <h2 class="title1">New Sauce</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>New Sauce</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                {!! Form::open(["method" => "POST", "route" => "sauces.store"]) !!}
                @include("sauces.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
