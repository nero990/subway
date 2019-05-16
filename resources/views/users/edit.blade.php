@extends("layouts.app")

@section("content")

    <div class="forms">
        <h2 class="title1">Upate User</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Update User</h4>
            </div>
            <div class="form-body">
                @include('errors.list')
                @include('flash::message')
                {!! Form::model($user, ["method" => "PUT", "route" => ["users.update", $user->id]]) !!}
                @include("users.partials.form")
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
