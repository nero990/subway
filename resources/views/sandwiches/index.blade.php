@extends("layouts.app")

@section("content")
    <div class="tables">
        <h2 class="title1">Sandwiches</h2>
        <div class="panel-body widget-shadow">
            @include('flash::message')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                @foreach($sandwiches as $key => $sandwich)
                    <tr>
                        <td>{{ (++$key + ($sandwiches->currentPage() - 1) * $sandwiches->perPage()) }}</td>
                        <td>{{$sandwich->taste}}</td>
                        <td>{{$sandwich->created_at->format("F m, Y")}}</td>
                        <td>{{$sandwich->updated_at->format("F m, Y")}}</td>
                        <td>
                            <a href="{{route("sandwiches.edit", $sandwich->id)}}"><span class="fa fa-edit"></span></a>
                            <a href="{{route("sandwiches.destroy", $sandwich->id)}}"><span class="fa fa-remove"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$sandwiches->links() }}
        </div>
    </div>
@endsection
