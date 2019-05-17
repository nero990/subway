@extends("layouts.app")
@section("breads_active") active @endsection

@section("content")

    <div class="forms">
        <h2 class="title1">Update Bread</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Update Bread</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                @include('flash::message')
                {!! Form::model($bread, ["method" => "PUT", "route" => ["breads.update", $bread->id]]) !!}
                @include("breads.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
