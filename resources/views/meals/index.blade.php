@extends("layouts.app")
@section("meals_active") active @endsection
@section("meals_all_active") class="active" @endsection
@section("styles") <link href="{{asset("css/starability-all.min.css")}}" rel="stylesheet"> @endsection

@section("content")
    <div class="tables">
        <h2 class="title1">Meals</h2>
        <div class="panel-body widget-shadow">
            @include('flash::message')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Reg Count</th>
                        <th>Created At</th>
                        <th>Ratings</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                @foreach($meals as $key => $meal)
                    <tr>
                        <td>{{ (++$key + ($meals->currentPage() - 1) * $meals->perPage()) }}</td>
                        <td>{{$meal->name}}</td>
                        <td><span class="label @if($meal->status == "OPEN")  {{"label-success"}} @else {{"label-danger"}} @endif">{{$meal->status}}</span></td>
                        <td>{{$meal->meal_registrations_count}}</td>
                        <td>{{$meal->created_at->format("M j, Y")}}</td>
                        <td>
                            <p class="starability-result" data-rating="{{intval($meal->averageRating)}}" style="font-size: 0.02em"></p>
                        </td>
                        <td>
                            <a href="{{route("meals.show", $meal->id)}}" title="View Meal Registration"><span class="fa fa-eye"></span></a>
                            <a href="{{route("meals.edit", $meal->id)}}" title="Edit meal"><span class="fa fa-edit"></span></a>
                            <a href="{{route("meals.destroy", $meal->id)}}" title="Delete meal"><span class="fa fa-remove"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$meals->links() }}
        </div>
    </div>
@endsection
