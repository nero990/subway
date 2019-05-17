@extends("layouts.app")
@section("sauces_active") active @endsection
@section("sauces_all_active") class="active" @endsection

@section("content")
    <div class="tables">
        <h2 class="title1">Sauces</h2>
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

                @foreach($sauces as $key => $sauce)
                    <tr>
                        <td>{{ (++$key + ($sauces->currentPage() - 1) * $sauces->perPage()) }}</td>
                        <td>{{$sauce->name}}</td>
                        <td>{{$sauce->created_at->format("M j, Y")}}</td>
                        <td>{{$sauce->updated_at->format("M j, Y")}}</td>
                        <td>
                            <a href="{{route("sauces.edit", $sauce->id)}}"><span class="fa fa-edit"></span></a>
                            <a href="{{route("sauces.destroy", $sauce->id)}}"><span class="fa fa-remove"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$sauces->links() }}
        </div>
    </div>
@endsection
