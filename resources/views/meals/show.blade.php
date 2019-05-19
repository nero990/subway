@extends("layouts.app")
@section("title") Meal Details {{$meal->name}} @endsection
@section("meals_active") active @endsection
@section("styles") <link href="{{asset("css/starability-all.min.css")}}" rel="stylesheet"> @endsection

@section("content")
    <div class="tables">
        <h2 class="title1">Meal Details [{{$meal->name}}]</h2>
        <div class="panel-body widget-shadow">
            <div class="col-sm-8">
                <div class="show-card">
                    <div class="block">
                        <label>Meal Name:</label>
                        <span><strong>{{$meal->name}}</strong></span>
                    </div>
                    <div class="block">
                        <label>Unique Link:</label>
                        <span style="font-size: 14px"><a href="{{$meal->unique_link}}" target="_blank">{{$meal->unique_link}}</a></span>
                    </div>
                    <div class="block">
                        <label>Status:</label>
                        <span><strong>{{$meal->status}}</strong></span>
                    </div>
                    <div class="block">
                        <label>Date of Eating:</label>
                        <span><strong>{{$meal->eaten_at->format('M j Y')}}</strong></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <p class="starability-result" data-rating="{{intval($meal->averageRating)}}"></p>
            </div>
            @include('flash::message')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Bread</th>
                        <th>Bread Size</th>
                        <th>Baked</th>
                        <th>Sandwich Taste</th>
                        <th>Sauce</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                @foreach($meal->mealRegistrations as $key => $registration)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{$registration->user->name}}</td>
                        <td>{{$registration->bread->name}}</td>
                        <td>{{$registration->bread_size}}</td>
                        <td>{{$registration->baked}}</td>
                        <td>{{$registration->sandwich->taste}}</td>
                        <td>{{$registration->sauce->name}}</td>
                        <td>{{$registration->created_at->format("M j, Y")}}</td>
                        <td>
                            <a href=""><span class="fa fa-eye"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
