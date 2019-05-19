@extends("layouts.app")
@section("meal_registrations_active") active @endsection
@section("meal_registrations_all_active") class="active" @endsection
@section("styles") <link href="{{asset("css/starability-all.min.css")}}" rel="stylesheet"> @endsection

@section("content")
    <div class="tables">
        <h2 class="title1">My Meal Order [{{$mealRegistration->meal->name}}]</h2>
        <div class="panel-body widget-shadow">
            <div class="col-sm-8">
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
            <div class="col-sm-4">
                @if($rating)
                    <h4>Your rating</h4>
                    <p class="starability-result" data-rating="{{$rating->rating}}">
                        Rated: {{$rating->rating}} stars
                    </p>
                @else
                <legend>Rate this meal</legend>
                {!! Form::open(["method" => "POST", "route" => ["meals.rate", $mealRegistration->meal->id], "id" => "rateForm"]) !!}
                    <!-- Change starability-basic to different class to see animations. -->
                    <fieldset class="starability-grow">
                        <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked aria-label="No rating." />

                        <input type="radio" id="rate1" name="rating" value="1" />
                        <label for="rate1">1 star.</label>

                        <input type="radio" id="rate2" name="rating" value="2" />
                        <label for="rate2">2 stars.</label>

                        <input type="radio" id="rate3" name="rating" value="3" />
                        <label for="rate3">3 stars.</label>

                        <input type="radio" id="rate4" name="rating" value="4" />
                        <label for="rate4">4 stars.</label>

                        <input type="radio" id="rate5" name="rating" value="5" />
                        <label for="rate5">5 stars.</label>

                        <span class="starability-focus-ring"></span>
                    </fieldset>
                {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $(document).ready(function () {
            $("#rateForm input").change(function () {
                $("#rateForm").submit();
            })
        });
    </script>
@endsection
