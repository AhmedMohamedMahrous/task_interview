@extends("layouts.app")
@section("content")
    <div class="container">

        <h1 style="text-align: center">Projects to work</h1>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Description</th>
                <th scope="col">Cretion Date</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td> <a href="{{route("single_projects",$project->id)}}"> {{ $project->name }} </a> </td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td> <a href="{{ route("delete_project", $project->id) }}" class="btn btn-danger">Delete</a> </td>
                </tr>
            @endforeach


            </tbody>
        </table>

    </div>

@endsection
