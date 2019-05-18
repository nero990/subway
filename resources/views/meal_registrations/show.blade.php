@extends("layouts.app")
@section("meal_registrations_active") active @endsection
@section("meal_registrations_all_active") class="active" @endsection

@section("content")
    <div class="tables">
        <h2 class="title1">My Meal Order [{{$mealRegistration->meal->name}}]</h2>
        <div class="panel-body widget-shadow">
            <div class="show-card">
                <div class="block">
                    <label>Meal: </label>
                    <span><strong>{{$mealRegistration->meal->name}}</strong></span>
                </div>
                <div class="block">
                    <label>Status:</label>
                    <span><label class="label @if($mealRegistration->meal->is_open) {{"label-success"}} @else {{ "label-danger" }}@endif">
                        {{$mealRegistration->meal->status}}</label></span>
                </div>
                <div class="block">
                    <label>Bread:</label>
                    <span><strong>{{$mealRegistration->bread->name}}</strong></span>
                </div>
                <div class="block">
                    <label>Bread Size:</label>
                    <span><strong>{{$mealRegistration->bread_size}} cm</strong></span>
                </div>
                <div class="block">
                    <label>Baked:</label>
                    <span><strong>{{$mealRegistration->baked}}</strong></span>
                </div>
                <div class="block">
                    <label>Sandwich:</label>
                    <span><strong>{{$mealRegistration->sandwich->taste}}</strong></span>
                </div>
                <div class="block">
                    <label>Sauce:</label>
                    <span><strong>{{$mealRegistration->sauce->name}}</strong></span>
                </div>
                <div class="block">
                    <label>Extra:</label>
                    <span><strong>{{$mealRegistration->extra}}</strong></span>
                </div>
                <div class="block">
                    <label>Created At:</label>
                    <span><strong>{{$mealRegistration->created_at->format("F j Y")}}</strong></span>
                </div>
                <div class="block">
                    <label>Updated At:</label>
                    <span><strong>{{$mealRegistration->updated_at->format("F j Y")}}</strong></span>
                </div>

                <div class="clearfix"></div>
                <div style="padding-top: 20px">
                    <a href="{{route("meal-registrations.index")}}" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i> Back</a>

                </div>
            </div>
        </div>
    </div>
@endsection
