@extends("layouts.app")
@section("breads_active") active @endsection
@section("breads_new_active") class="active" @endsection

@section("content")
    <div class="forms">
        <h2 class="title1">New Bread</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>New Bread</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                {!! Form::open(["method" => "POST", "route" => "breads.store"]) !!}
                @include("breads.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
