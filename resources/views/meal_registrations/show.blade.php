@extends("layouts.app")
@section("meal_registrations_active") active @endsection
@section("meal_registrations_all_active") class="active" @endsection

@section("content")
    <div class="tables">
        <h2 class="title1">My Meal Order [{{$meal_registration->meal->name}}]</h2>
        <div class="panel-body widget-shadow">
            <p>Meal: <strong>{{$meal_registration->meal->name}}</strong></p>
            <p>Status: <label class="label @if($meal_registration->meal->is_open) {{"label-success"}} @else {{ "label-danger" }}@endif">
                    {{$meal_registration->meal->status}}</label></p>
            <p>Bread: <strong>{{$meal_registration->bread->name}}</strong></p>
            <p>Bread Size: <strong>{{$meal_registration->bread_size}}</strong></p>
            <p>Baked: <strong>{{$meal_registration->baked}}</strong></p>
            <p>Sandwich: <strong>{{$meal_registration->sandwich->taste}}</strong></p>
            <p>Sauce: <strong>{{$meal_registration->sauce->name}}</strong></p>
            <p>Extra: <strong>{{$meal_registration->extra}}</strong></p>
            <p>Created At: <strong>{{$meal_registration->created_at->format("F j Y")}}</strong></p>
            <p>Updated At: <strong>{{$meal_registration->updated_at->format("F j Y")}}</strong></p>
        </div>
    </div>
@endsection
