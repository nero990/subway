@extends("layouts.app")
@section("title") Meal Details {{$meal->name}} @endsection
@section("meals_active") active @endsection

@section("content")
    <div class="tables">
        <h2 class="title1">Meal Details [{{$meal->name}}]</h2>
        <div class="panel-body widget-shadow">
            <div>
                <p>Name: <strong>{{$meal->name}}</strong></p>
                <p>Status: <strong>{{$meal->status}}</strong></p>
                <p>Date of Eating: <strong>{{$meal->eaten_at->format('M j Y')}}</strong></p>
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
