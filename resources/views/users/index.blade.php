@extends("layouts.app")
@section("users_active") active @endsection
@section("users_all_active") class="active" @endsection

@section("content")
    <div class="tables">
        <h2 class="title1">Users</h2>
        <div class="panel-body widget-shadow">
            @include('flash::message')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                @foreach($users as $key => $user)
                    <tr>
                        <td>{{ (++$key + ($users->currentPage() - 1) * $users->perPage()) }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><span class="label @if($user->is_admin)  {{'label-success'}} @else {{'label-warning'}} @endif">{{$user->role}}</span></td>
                        <td>{{$user->created_at->format("M j, Y")}}</td>
                        <td>{{$user->updated_at->format("M j, Y")}}</td>
                        <td>
                            <a href="{{route("users.edit", $user->id)}}"><span class="fa fa-edit"></span></a>
                            <a href="{{route("users.destroy", $user->id)}}"><span class="fa fa-remove"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links() }}
        </div>

    </div>
@endsection
