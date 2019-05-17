@extends("layouts.app")

@section("content")
    <div class="forms">
        <h2 class="title1">New Sandwich</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>New Sandwich</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                {!! Form::open(["method" => "POST", "route" => "sandwiches.store"]) !!}
                @include("sandwiches.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
