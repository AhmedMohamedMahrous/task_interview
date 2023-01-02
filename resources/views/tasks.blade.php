@extends("layouts.app")

@section("content")

    <div class="container">

        <h1 style="text-align: center">Tasks to work</h1>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">project</th>
                <th scope="col">Supervisor</th>
            </tr>
            </thead>
            <tbody>

                @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td> <a href="{{route("single_task",$task->id)}}"> {{ $task->name }} </a> </td>
                        <td>{{ $task->project->name }}</td>
                        <td>{{ $task->supervisor->name }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
@endsection
