@extends("layouts.app")
@section("vegetables_active") active @endsection
@section("vegetables_new_active") class="active" @endsection

@section("content")
    <div class="forms">
        <h2 class="title1">New Vegetable</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>New Vegetable</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                {!! Form::open(["method" => "POST", "route" => "vegetables.store"]) !!}
                @include("vegetables.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
