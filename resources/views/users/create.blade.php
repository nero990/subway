@extends("layouts.app")
@section("users_active") active @endsection
@section("users_new_active") class="active" @endsection

@section("content")

    <div class="forms">
        <h2 class="title1">New User</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>New User</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                {!! Form::open(["method" => "POST", "route" => "users.store"]) !!}
                @include("users.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
