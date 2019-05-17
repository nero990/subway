@extends("layouts.app")
@section("meal_registrations_active") active @endsection
@section("meal_registrations_all_active") class="active" @endsection

@section("content")
    <div class="tables">
        <h2 class="title1">My Meal Order</h2>
        <div class="panel-body widget-shadow">
            @if($is_meal_opened) <a href="{{route("meal-registrations.create")}}" class="btn btn-info">Make new order</a> @endif
            @include('flash::message')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Meal</th>
                        <th>Status</th>
                        <th>Bread</th>
                        <th>Bread Size</th>
                        <th>Baked</th>
                        <th>Sandwich</th>
                        <th>Sauce</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                @foreach($meal_registrations as $key => $registration)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{$registration->meal->name}}</td>
                        <td><span class="label @if($registration->meal->status == "OPEN")  {{"label-success"}} @else {{"label-danger"}} @endif">{{$registration->meal->status}}</span></td>
                        <td>{{$registration->bread->name}}</td>
                        <td>{{$registration->bread_size}}cm</td>
                        <td>{{$registration->baked}}</td>
                        <td>{{$registration->sandwich->taste}}</td>
                        <td>{{$registration->sauce->name}}</td>
                        <td>{{$registration->created_at->format("M j, Y")}}</td>
                        <td>
                            <a href="{{route("meal-registrations.show", $registration->id)}}"><i class="fa fa-eye"></i></a>
                            @if($registration->meal->status == "OPEN")
                            <a href="{{route("meal-registrations.edit", $registration->id)}}"><i class="fa fa-edit"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
