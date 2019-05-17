@extends("layouts.app")
@section("breads_active") active @endsection
@section("breads_all_active") class="active" @endsection

@section("content")
    <div class="tables">
        <h2 class="title1">Breads</h2>
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

                @foreach($breads as $key => $bread)
                    <tr>
                        <td>{{ (++$key + ($breads->currentPage() - 1) * $breads->perPage()) }}</td>
                        <td>{{$bread->name}}</td>
                        <td>{{$bread->created_at->format("M j, Y")}}</td>
                        <td>{{$bread->updated_at->format("M j, Y")}}</td>
                        <td>
                            <a href="{{route("breads.edit", $bread->id)}}"><span class="fa fa-edit"></span></a>
                            <a href="{{route("breads.destroy", $bread->id)}}"><span class="fa fa-remove"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$breads->links() }}
        </div>
    </div>
@endsection
