@extends("layouts.app")
@section("content")
    <div class="container">
        <form method="post" action="{{ route("add_task",$project->id) }}" >
            @csrf
            <h3>Add Anew Task</h3>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Task Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="name">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">choice User worker</label>
                <div class="col-sm-10">

                    <div class="">
                        <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                        <select class="form-select" id="autoSizingSelect" name="user_id">
                            <option selected value="-1">Choose...</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach


                        </select>

                    </div>
                </div>
                @error('user_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        @if(count($tasks) > 0)
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">project</th>
                <th scope="col">User Worker</th>
                <th scope="col">Submitted</th>
            </tr>
            </thead>
            <tbody>

            @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>  {{ $task->name }}  </td>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->UserWorker[0]->name }}</td>
                    <td>{{ $task->submitted }}</td>
                </tr>
            @endforeach
            @endif


            </tbody>
        </table>
    </div>
@endsection
