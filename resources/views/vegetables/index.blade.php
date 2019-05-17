@extends("layouts.app")

@section("content")
    <div class="tables">
        <h2 class="title1">Vegetables</h2>
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

                @foreach($vegetables as $key => $vegetable)
                    <tr>
                        <td>{{ (++$key + ($vegetables->currentPage() - 1) * $vegetables->perPage()) }}</td>
                        <td>{{$vegetable->name}}</td>
                        <td>{{$vegetable->created_at->format("F m, Y")}}</td>
                        <td>{{$vegetable->updated_at->format("F m, Y")}}</td>
                        <td>
                            <a href="{{route("vegetables.edit", $vegetable->id)}}"><span class="fa fa-edit"></span></a>
                            <a href="{{route("vegetables.destroy", $vegetable->id)}}"><span class="fa fa-remove"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$vegetables->links() }}
        </div>
    </div>
@endsection
